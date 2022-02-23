<?php
namespace App\Controller\Practitioner;

use App\Controller\Practitioner\AppController;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\Http\Client;
use Exception;
use Cake\Collection\Collection;
use Cake\Mailer\MailerAwareTrait;
use Cake\Event\Event;

require ROOT . '/src/Vendor/Jwt/vendor/autoload.php';

use Zenstruck\JWT\Token;
use Zenstruck\JWT\Signer\HMAC\HS256;

define('CLIENT_ID', 'Iu0xUtk1TZqfKQtU69KUw');
define('CLIENT_SECRET', 'JHHTqqT8tD1hjoiixImJa4gzd528I1hg');
define('REDIRECT_URI', 'https://portokalledemo.tk/backend/practitioner/appointments/callback');

define('ZOOM_API_KEY', 'bHcuurhUTA-7NkmJp_DQVA');
define('ZOOM_SECRET_KEY', 'ZouS0XbYhyMv54ouAX0nH01B8pUuK3zgqdja');

class AppointmentsController extends AppController
{
    use MailerAwareTrait;

    public function callVideoChat($id = null)
    {
        $this->layout = 'chat';
    }

    public function getZoomAccessToken()
    {
        $this->autoRender = false;
        $key = ZOOM_SECRET_KEY;
        $token = new Token([
            'username' => 'kevin',
            'iss' => ZOOM_API_KEY,
            'exp' => time() + 86400,
        ]); 
        $token->sign(new HS256(), $key);
        $encodedTokenForUser = (string) $token;
        return $encodedTokenForUser;
    }

    // public function callback()
    // {
    //     try {
    //         $http = new Client();
    //         $response = $http->post('https://zoom.us/oauth/token', 
    //             [
    //                 "grant_type" => "authorization_code",
    //                 "code" => $_GET['code'],
    //                 "redirect_uri" => REDIRECT_URI
    //             ],
    //             [
    //                 "headers" => [
    //                     "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
    //                 ],
    //             ]);


    //         $token = json_decode($response->getBody()->getContents(), true);
    //         $session = $this->getRequest()->getSession();
    //         $appointment = $this->Appointments
    //             ->find()
    //             ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
    //             ->contain(['Zooms'])
    //             ->first();

    //         $data = [
    //             'zoom' => [
    //                 'provider_value' => serialize($token),
    //                 'provider' => 'zoom'
    //             ]
    //         ];

    //         $appointment = $this->Appointments->patchEntity($appointment, $data);
    //         $this->Appointments->save($appointment);
    //         $results = 'Access token inserted successfully';
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }

    //     $this->set(compact('results', 'appointment'));
        
    // }

    public function createMeeting($uuid = null)
    {
        $session = $this->getRequest()->getSession();
        $appointment = $this->Appointments
            ->find()
            ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
            ->contain(['Zooms'])
            ->first();

        if ($appointment->meetingId) {
            return $this->redirect(['action' => 'view', $appointment->id]);
        }
        $time = new Time(__('{0} {1}', [$appointment->date->format('Y-m-d'), $appointment->start_time]));

        try {
            $http = new Client();
            $data = [
                "topic" => "Meeting #" . $appointment->id,
                "type" => 2,
                "start_time" => date('Y-m-d\TH:i:s', strtotime($time)),
                "duration" => $appointment->duration,
                "password" => rand(0, 999999),
            ];
            $response = $http->post('https://api.zoom.us/v2/users/me/meetings', json_encode($data), ['headers' => [
                'Content-Type' => 'application/json',
                "Authorization" => 'Bearer ' . $appointment->token]]);
            $data = json_decode($response->getBody());
            switch ($response->code) {
                case 401:
                    throw new \Cake\Http\Exception\UnauthorizedException();
                    break;
                
                default:
                    $data = [
                        'meetingId' => $data->id
                    ];

                    $appointment = $this->Appointments->patchEntity($appointment, $data);
                
                    $this->Appointments->save($appointment);

                    return $this->redirect(['action' => 'meeting', $appointment->uuid]);
                    break;
            }

        } catch (Exception $e) {
            if (401 == $e->getCode()) {
                // $http = new Client();
                // $response = $http->post('https://zoom.us/oauth/token', 
                //     [
                //         "grant_type" => "refresh_token",
                //         "refresh_token" => unserialize($appointment->zoom->provider_value)['refresh_token'],
                //     ],
                //     [
                //         "headers" => [
                //             "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
                //         ],
                //     ]);
                // $token = json_decode($response->getBody()->getContents(), true);

                // $session = $this->getRequest()->getSession();
                // $appointment = $this->Appointments
                //     ->find()
                //     ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
                //     ->contain(['Patients', 'Zooms'])
                //     ->first();

                // $data = [
                //     'zoom' => [
                //         'provider_value' => serialize($token),
                //         'provider' => 'zoom'
                //     ]
                // ];

                $token = $this->getZoomAccessToken();

                $data = [
                    'token' => $token
                ];

                $appointment = $this->Appointments->patchEntity($appointment, $data);
            
                $this->Appointments->save($appointment);
                $this->createMeeting($appointment->uuid);
            } else {
                echo $e->getMessage();
            }

        }
    }

    public function meetingStatus($uuid = null)
    {
        $this->autoRender = false;
        $session = $this->getRequest()->getSession();
        $appointment = $this->Appointments
            ->find()
            ->where(['Appointments.uuid' => $uuid])
            ->contain(['Zooms'])
            ->first();

        $time = new Time(__('{0} {1}', [$appointment->date->format('Y-m-d'), $appointment->start_time]));
        
        if (strtotime($time) > strtotime(Time::now()) || $appointment->end_meeting) {
            $this->Flash->info("It's not time to join yet");
            return $this->redirect(['action' => 'view', $appointment->id]);
        }
        
        try {
            $http = new Client();
            $data = [
                'action' => 'end'
            ];
            $response = $http->put('https://api.zoom.us/v2/meetings/' . $appointment->meetingId . '/status', json_encode($data), ['headers' => [
                'Content-Type' => 'application/json',
                "Authorization" => 'Bearer ' . $appointment->token]]);
            
            $data = json_decode($response->getBody()->getContents(), true);

            switch ($response->code) {
                case 401:
                    throw new \Cake\Http\Exception\UnauthorizedException();
                    break;
                
                default:
                    $data = [
                        'end_meeting' => 1
                    ];

                    $appointment = $this->Appointments->patchEntity($appointment, $data);
                
                    $this->Appointments->save($appointment);

                    return $this->redirect(['action' => 'view', $appointment->id]);
                    break;
            }

        } catch (Exception $e) {
            if (401 == $e->getCode()) {
                // $http = new Client();
                // $response = $http->post('https://zoom.us/oauth/token', 
                //     [
                //         "grant_type" => "refresh_token",
                //         "refresh_token" => unserialize($appointment->zoom->provider_value)['refresh_token'],
                //     ],
                //     [
                //         "headers" => [
                //             "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
                //         ],
                //     ]);
                // $token = json_decode($response->getBody()->getContents(), true);

                // $session = $this->getRequest()->getSession();
                // $appointment = $this->Appointments
                //     ->find()
                //     ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
                //     ->contain(['Patients', 'Zooms'])
                //     ->first();

                // $data = [
                //     'zoom' => [
                //         'provider_value' => serialize($token),
                //         'provider' => 'zoom'
                //     ]
                // ];

                $token = $this->getZoomAccessToken();

                $data = [
                    'token' => $token
                ];

                $appointment = $this->Appointments->patchEntity($appointment, $data);
            
                $this->Appointments->save($appointment);
                $this->meetingStatus($appointment->uuid);
            } else {
                echo $e->getMessage();
            }

        }
    }

    public function meeting($uuid = null)
    {
        $appointment = $this->Appointments
            ->find()
            ->where(['Appointments.uuid' => $uuid])
            ->contain(['Patients.Users', 'Zooms', 'Personals', 'Services', 'Orders'])
            ->first();
        if (!$appointment) {
            return $this->redirect(['action' => 'index']);
        }

        if (empty($appointment->token)) {
            $token = $this->getZoomAccessToken();

            $data = [
                'token' => $token
            ];

            $appointment = $this->Appointments->patchEntity($appointment, $data);
            $this->Appointments->save($appointment);
        }
        try {
            $http = new Client();
            $response = $http->get('https://api.zoom.us/v2/meetings/' . $appointment->meetingId, [], ['headers' => [
                "Authorization" => 'Bearer ' . $appointment->token]]);

            switch ($response->code) {
                case 401:
                    throw new \Cake\Http\Exception\UnauthorizedException();
                    break;
                
                default:
                    $meeting = json_decode($response->getBody());

                    // $viewVars = $appointment->toArray();
                    // $viewVars['meeting'] = (array)$meeting;
                    // $this->getMailer('Appointment')->send('connectZoom', [$viewVars]);
                    break;
            }

        } catch (Exception $e) {
            if (401 == $e->getCode()) {
                // $http = new Client();
                // $response = $http->post('https://zoom.us/oauth/token', 
                //     [
                //         "grant_type" => "refresh_token",
                //         "refresh_token" => unserialize($appointment->zoom->provider_value)['refresh_token'],
                //     ],
                //     [
                //         "headers" => [
                //             "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
                //         ],
                //     ]);
                // $token = json_decode($response->getBody()->getContents(), true);

                // $session = $this->getRequest()->getSession();
                // $appointment = $this->Appointments
                //     ->find()
                //     ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
                //     ->contain(['Patients', 'Zooms'])
                //     ->first();

                // $data = [
                //     'zoom' => [
                //         'provider_value' => serialize($token),
                //         'provider' => 'zoom'
                //     ]
                // ];

                $token = $this->getZoomAccessToken();

                $data = [
                    'token' => $token
                ];
                $appointment = $this->Appointments->patchEntity($appointment, $data);
            
                $this->Appointments->save($appointment);
                $this->meeting($appointment->uuid);
            } else {
                echo $e->getMessage();
            }

        }

        $this->set(compact('uuid', 'appointment', 'meeting'));
    }

    public function pastMeetingDetails($uuid = null)
    {
        $appointment = $this->Appointments
            ->find()
            ->where(['Appointments.uuid' => $uuid])
            ->contain(['Patients', 'Zooms'])
            ->first();
        if (!$appointment) {
            return $this->redirect(['action' => 'index']);
        }

        try {
            $http = new Client();
            $response = $http->get('https://api.zoom.us/v2/past_meetings/' . $appointment->meetingId, [], ['headers' => [
                "Authorization" => 'Bearer ' . $appointment->token]]);

            switch ($response->code) {
                case 401:
                    throw new \Cake\Http\Exception\UnauthorizedException();
                    break;
                
                default:
                    $meeting = json_decode($response->getBody());
                    break;
            }

        } catch (Exception $e) {
            if (401 == $e->getCode()) {
                // $http = new Client();
                // $response = $http->post('https://zoom.us/oauth/token', 
                //     [
                //         "grant_type" => "refresh_token",
                //         "refresh_token" => unserialize($appointment->zoom->provider_value)['refresh_token'],
                //     ],
                //     [
                //         "headers" => [
                //             "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
                //         ],
                //     ]);
                // $token = json_decode($response->getBody()->getContents(), true);

                // $session = $this->getRequest()->getSession();
                // $appointment = $this->Appointments
                //     ->find()
                //     ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
                //     ->contain(['Patients', 'Zooms'])
                //     ->first();

                // $data = [
                //     'zoom' => [
                //         'provider_value' => serialize($token),
                //         'provider' => 'zoom'
                //     ]
                // ];

                $token = $this->getZoomAccessToken();

                $data = [
                    'token' => $token
                ];

                $appointment = $this->Appointments->patchEntity($appointment, $data);
            
                $this->Appointments->save($appointment);
                $this->pastMeetingDetails($appointment->uuid);
            } else {
                echo $e->getMessage();
            }

        }

        $this->set(compact('uuid', 'appointment', 'meeting'));
    }
    // public function meeting($uuid)
    // {
    //     $this->layout = 'ajax';
    //     $appointment = $this->Appointments
    //         ->find()
    //         ->where(['Appointments.uuid' => $uuid])
    //         ->contain(['Practitioners'])
    //         ->first();
    //     if (!$appointment) {
    //         return $this->redirect(['action' => 'index']);
    //     }

    //     // if (strtotime(new FrozenTime($appointment->date . ' ' . $appointment->start_time)) < strtotime(Time::now())) {
    //     //     $this->Flash->error('Time error');
    //     //     return $this->redirect($this->referer());
    //     // }
    //     if (!$appointment->practitioner_attended) {
    //         $appointment->practitioner_attended = Time::now();
    //         $this->Appointments->save($appointment);
    //     }
    //     $this->set(compact('uuid', 'appointment'));
    // }

    public function left($uuid)
    {
        $this->autoRender = false;
        $appointment = $this->Appointments
            ->find()
            ->where(['Appointments.uuid' => $uuid])
            ->contain(['Practitioners'])
            ->first();

        if (!$appointment->practitioner_left) {
            $appointment->practitioner_left = Time::now();
            if (!$appointment->patient_attended || !$appointment->patient_left) {
                $appointment->status = 'Did not attend';
            }

            if ($appointment->patient_attended && $appointment->practitioner_attended && $appointment->practitioner_left) {
                $check_start = $appointment->patient_attended;
                if (strtotime($appointment->patient_attended) < strtotime($appointment->practitioner_attended)) {
                    $check_start = $appointment->practitioner_attended;
                }

                $check_end = $appointment->patient_left;
                if (strtotime($appointment->patient_left) < strtotime($appointment->practitioner_left)) {
                    $check_end = $appointment->practitioner_left;
                }
                $diff = abs(strtotime($check_end) - strtotime($check_start));

                $years = floor($diff / (365*60*60*24));   
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));   
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));   
                $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));   
                $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);   
                $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60)); 

                $duration = $minutes; 
                $appointment->duration = $duration;
                $appointment->end_time = Time::now()->format('H:s');
            }

            $this->Appointments->save($appointment);
        }
        return $this->redirect(['action' => 'index']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $con = ['Personals.user_id' => $this->AuthUser->user('id')];

        if ($this->request->getQuery('keywords')) {
            $con['OR']['Appointments.id'] = $this->request->getQuery('keywords');
        }

        $appointments = $this->Appointments
            ->find()
            ->where($con)
            ->contain(['Personals', 'Patients'])
            ->order(['Appointments.id' => 'DESC']);

        $combined = (new Collection($appointments))->combine(
            'id', 
            function ($entity) { 
                return $entity;
            },
            function ($entity) { 
                return $entity->date->toDateString();
            })
        ->toArray();
        $this->set(compact('combined'));
    }

    public function schedule()
    {
        $appointments = $this->Appointments
            ->find()
            ->where(['Personals.user_id' => $this->AuthUser->user('id')])
            ->contain(['Personals', 'Patients'])
            ->toArray();

        $dateCalendar = [];
        foreach ($appointments as $key => $ap) {  
            $dateCalendar[$key]['title'] = $ap->patient->full_name . ' ' .  strtolower($ap->status);
            if (!empty($ap->start_time)) {
                $dateCalendar[$key]['start'] = new FrozenTime($ap->date . ' ' . $ap->start_time);
            }
            
            if (!empty($ap->end_time)) {
                $dateCalendar[$key]['end'] = new FrozenTime($ap->date . ' ' . $ap->end_time); 
            }
            
            // if ($ap->id == $id) {
            //     $dateCalendar[$key]['className'] = 'fc-event-light fc-event-solid-success';
            // }
        }
        $this->set(compact('dateCalendar'));
    }
    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Patients', 'Zooms', 'Orders', 'Services'],
        ]);

        if (!$appointment->practitioner_read) {
            $appointment->practitioner_read = 1;
            $this->Appointments->save($appointment);
        }
        $session = $this->getRequest()->getSession();

        if (!$session->check('uuidMeeting')) {
            $session->write('uuidMeeting', $appointment->uuid);        
        }

        if ($session->read('uuidMeeting') != $appointment->uuid) {
            $session->write('uuidMeeting', $appointment->uuid);        
        }
        $this->set(compact('appointment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appointment = $this->Appointments->newEntity();
        if ($this->request->is('post')) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $patients = $this->Appointments->Patients->find('list', ['limit' => 200]);
        $this->set(compact('appointment', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Patients'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
        $this->set(compact('appointment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appointment = $this->Appointments->get($id);
        if ($this->Appointments->delete($appointment)) {
            $this->Flash->success(__('The appointment has been deleted.'));
        } else {
            $this->Flash->error(__('The appointment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
