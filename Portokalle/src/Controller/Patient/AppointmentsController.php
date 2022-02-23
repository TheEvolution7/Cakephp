<?php
namespace App\Controller\Patient;

use App\Controller\Patient\AppController;
use Cake\Utility\Text;
use App\Event\Notifications;
use Cake\Event\Event;
use Cake\Collection\Collection;
use Cake\I18n\Time;
use Cake\I18n\FrozenTime;
use Cake\Http\Client;
use Cake\Mailer\MailerAwareTrait;

use Exception;

require ROOT . '/src/Vendor/Jwt/vendor/autoload.php';

use Zenstruck\JWT\Token;
use Zenstruck\JWT\Signer\HMAC\HS256;

define('CLIENT_ID', 'Iu0xUtk1TZqfKQtU69KUw');
define('CLIENT_SECRET', 'JHHTqqT8tD1hjoiixImJa4gzd528I1hg');
define('REDIRECT_URI', 'https://portokalledemo.tk/backend/patient/appointments/callback');

define('PAYPAL_API_CLIENT_ID', 'ATs8k6FSLwHqx6m2t2ss_U0xTVc6RnlzCoOWerH_RXb29cEf1BahvLD0aRRFv7sYKYshisjib4AIYdKv');  
define('PAYPAL_API_SECRET', 'EBHTkObjxey-EQxifuUUbBWerWFWWnEJVyZFQX4k87fC0-gOiTXCei7ez52SDu_NtoKbhRItwfGPOpv7'); 
define('PAYPAL_SANDBOX', true); //set false for production 

define('ZOOM_API_KEY', 'bHcuurhUTA-7NkmJp_DQVA');
define('ZOOM_SECRET_KEY', 'ZouS0XbYhyMv54ouAX0nH01B8pUuK3zgqdja');

class AppointmentsController extends AppController
{
    use MailerAwareTrait;

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

    public function meeting($uuid = null)
    {
        $appointment = $this->Appointments
            ->find()
            ->where(['Appointments.uuid' => $uuid])
            ->contain(['Patients', 'Zooms'])
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

    // public function getMeeting($meetingId = null){
    //     $this->autoRender = false;
    //     $session = $this->getRequest()->getSession();
    //     $appointment = $this->Appointments
    //         ->find()
    //         ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
    //         ->contain(['Zooms'])
    //         ->first();

    //     try {
    //         $http = new Client();
    //         $response = $http->get('https://api.zoom.us/v2/meetings/' . $meetingId, [], ['headers' => [
    //             "Authorization" => 'Bearer ' . unserialize($appointment->zoom->provider_value)['access_token']]]);
            
    //         $data = json_decode($response->getBody());
    //         pr($data);
    //     } catch (Exception $e) {
    //         if (401 == $e->getCode()) {
    //             $http = new Client();
    //             $response = $http->post('https://zoom.us/oauth/token', 
    //                 [
    //                     "grant_type" => "refresh_token",
    //                     "refresh_token" => unserialize($appointment->zoom->provider_value)['refresh_token'],
    //                 ],
    //                 [
    //                     "headers" => [
    //                         "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
    //                     ],
    //                 ]);
    //             $token = json_decode($response->getBody()->getContents(), true);

    //             $session = $this->getRequest()->getSession();
    //             $appointment = $this->Appointments
    //                 ->find()
    //                 ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
    //                 ->contain(['Patients', 'Zooms'])
    //                 ->first();

    //             $data = [
    //                 'zoom' => [
    //                     'provider_value' => serialize($token),
    //                     'provider' => 'zoom'
    //                 ]
    //             ];

    //             $appointment = $this->Appointments->patchEntity($appointment, $data);
            
    //             $this->Appointments->save($appointment);
    //         } else {
    //             echo $e->getMessage();
    //         }

    //     }
    // }

    // public function meeting($uuid = null)
    // {
    //     $appointment = $this->Appointments
    //         ->find()
    //         ->where(['Appointments.uuid' => $uuid])
    //         ->contain(['Patients', 'Zooms'])
    //         ->first();
    //     if (!$appointment) {
    //         return $this->redirect(['action' => 'index']);
    //     }

    //     try {
    //         $http = new Client();
    //         $response = $http->get('https://api.zoom.us/v2/meetings/' . $appointment->meetingId, [], ['headers' => [
    //             "Authorization" => 'Bearer ' . unserialize($appointment->zoom->provider_value)['access_token']]]);
            
    //         $meeting = json_decode($response->getBody());

    //     } catch (Exception $e) {
    //         if (401 == $e->getCode()) {
    //             $http = new Client();
    //             $response = $http->post('https://zoom.us/oauth/token', 
    //                 [
    //                     "grant_type" => "refresh_token",
    //                     "refresh_token" => unserialize($appointment->zoom->provider_value)['refresh_token'],
    //                 ],
    //                 [
    //                     "headers" => [
    //                         "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
    //                     ],
    //                 ]);
    //             $token = json_decode($response->getBody()->getContents(), true);

    //             $session = $this->getRequest()->getSession();
    //             $appointment = $this->Appointments
    //                 ->find()
    //                 ->where(['Appointments.uuid' => $session->read('uuidMeeting')])
    //                 ->contain(['Patients', 'Zooms'])
    //                 ->first();

    //             $data = [
    //                 'zoom' => [
    //                     'provider_value' => serialize($token),
    //                     'provider' => 'zoom'
    //                 ]
    //             ];

    //             $appointment = $this->Appointments->patchEntity($appointment, $data);
            
    //             $this->Appointments->save($appointment);
    //         } else {
    //             echo $e->getMessage();
    //         }

    //     }

    //     $this->set(compact('uuid', 'appointment', 'meeting'));
    // }

    public function left($uuid)
    {
        $this->autoRender = false;
        $appointment = $this->Appointments
            ->find()
            ->where(['Appointments.uuid' => $uuid])
            ->contain(['Practitioners'])
            ->first();

        if (!$appointment->patient_left) {
            $appointment->patient_left = Time::now();
            if (!$appointment->practioner_attended) {
                $appointment->status = 'Pending';
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
            pr($appointment);exit;
            $this->Appointments->save($appointment);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function change(){
        $session = $this->getRequest()->getSession();
        $booking = $session->read('Booking');
        $appointment = $this->Appointments->get($booking->id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $createDate = new Time(__('{year}-{month}-{day} {hour}:{minute}', $this->request->getData('date')));
            $appointment->date = $createDate->format('Y-m-d');
            $appointment->start_time = $this->request->getData('date.hour') . ':' . $this->request->getData('date.minute');
            $appointment->day = $createDate->format('l');
            $appointment->status = 'Rescheduled';
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['action' => 'booking']);
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }
    }

    public function booking()
    {
        $session = $this->getRequest()->getSession();
        $booking = $session->read('Booking');
        $appointment = $this->Appointments->newEntity();
        
        if ($this->request->is('post')) {
            $consults = $session->read('Consults');
            $appointment->patient_id = $consults['patient']['patient_id'];
            $appointment->practitioner_id = $consults['practitioner']['practitioner_id'];
            $appointment->status = 'Booked';
            $appointment->type = 'Online';
            $appointment->location = 'Online Consultation';

            $appointment->description = serialize($consults['details']);

            $createDate = new Time(__('{year}-{month}-{day} {hour}:{minute}', $consults['time']['date']));

            $appointment->date = $createDate->format('Y-m-d');
            $appointment->start_time = $consults['time']['date']['hour'] . ':' . $consults['time']['date']['minute'];
            $appointment->day = $createDate->format('l');

            if ($this->Appointments->save($appointment)) {
                $session->write('Booking', $appointment);
                $session->delete('Consults');
                $this->Flash->success(__('The appointment has been saved.'));
            }
            $this->Flash->error(__('The appointment could not be saved. Please, try again.'));
        }

        $appointment = $this->Appointments->get($booking->id, [
            'contain' => ['Patients', 'Practitioners' => ['Personals']]
        ]);

        $this->set(compact('appointment'));
    }

    public function practitioners()
    {
        $this->loadModel('Users');
        $practitioners = $this->Users
            ->find()
            ->where(['role_id' => 5])
            ->contain(['Personals']);
        $this->set(compact('practitioners'));
    }

    public function listPractitioner()
    {
        $conditions = [
            'Users.role_id' => 5
        ];

        if ($this->request->getQuery('keyword')) {
            $conditions['Personals.full_name like'] = '%' . $this->request->getQuery('keyword') . '%';
        }

        $this->loadModel('Users');
        $practitioners = $this->Users
            ->find()
            ->where($conditions)
            ->innerJoinWith('Personals')
            ->contain(['Personals']);
        $this->set(compact('practitioners'));

    }

    public function consults($uuid = null, $type = null)
    {
        $list_type = $this->Appointments->listType();
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');

        if (!$session->check('Consults') &&  count($param) != 2) {
            $uuid = Text::uuid();
            $session->write('Consults.uuid', $uuid);
            return $this->redirect([$uuid, 'patient']);
        }
        if (count($param) != 2) {
            return $this->redirect([$session->read('Consults.uuid'), 'patient']);
        }
        switch ($type) {
            case 'patient':
                $this->patient($uuid, $type);
                break;

            // case 'locate':
            //     $this->locate($uuid, $type);
            //     break;

            case 'provider':
                $this->provider($uuid, $type);
                break;

            // case 'location':
            //     $this->loadModel('Countries');
            //     $countries = $this->Countries
            //         ->find('list', [
            //             'keyField' => 'countryCode',
            //             'valueField' => 'countryName'
            //         ]);
            //     $next = 'service';
            //     $prev = 'speciality';
            //     break;

            case 'speciality':
                $this->speciality($uuid, $type);
                break;

            case 'details':
                $this->details($uuid, $type);
                break;

            case 'service':
                $this->service($uuid, $type);
                break;

            case 'slot':
                $this->slot($uuid, $type);
                break;

            case 'review':
                $this->review($uuid, $type);
                break;

            case 'payment':
                $this->payment($uuid, $type);
                break;
            
            case 'checkout':
                $this->checkout($uuid, $type);
                break;

            case 'pairing':

            break;

            default:
                // code...
                break;
        }

        $this->set(compact('list_type'));
    }

    private function locate($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');

        $this->loadModel('Countries');
        $countries = $this->Countries
            ->find('list', [
                'keyField' => 'countryCode',
                'valueField' => 'countryName'
            ]);

        $next = 'patient';
        $prev = null;

        if ($this->request->is(['post'])) {
            $session->write('Consults.' . $type, $this->request->getData());
            return $this->redirect([$uuid, $next]);
        }

        $this->set(compact('countries', 'next', 'prev', 'session'));
    }
    
    private function patient($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');
        $this->loadModel('Patients');
        $patients = $this->Patients
            ->find()
            ->where(['Patients.user_id' => $this->AuthUser->user('id')]);

        if (empty($patients->toArray())) {
            $this->Flash->info('You must create patient');
            return $this->redirect(['controller' => 'Patients']);
        }
        $next = 'provider';
        $prev = 'locate';

        if ($this->request->is(['post'])) {
            $session->write('Consults.' . $type, $this->request->getData());
            return $this->redirect([$uuid, $next]);
        }
        
        $param[1] = $prev;
        $this->set(compact('patients', 'next', 'prev', 'param'));
    }

    private function speciality($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');

        $this->loadModel('Specialities');

        $specialities = $this->Specialities
            ->find()
            ->where(['Personals.id' => $session->read('Consults.findPractitioner.personal.id'), 'Specialities.status' => 1])
            ->innerJoinWith('Personals');
        if ($this->request->is(['post'])) {
            $speciality = $this->Specialities->get($this->request->getData('speciality_id'));

            if ($this->request->getData('type_booking') == 'as_soon_as_possible') {
                $next = 'details';
            }else{
                $next = 'service';
            }
            
            $data = $this->request->getData();
            if ($speciality->price > 0 && $this->request->getData('type_booking') == '') {
                $data['type_booking'] = 'as_soon_as_possible';
            }
            
            $session->write('Consults.' . $type, $data);
            return $this->redirect([$uuid, $next]);
        }
        $prev = 'provider';

        $param[1] = $prev;
        $this->set(compact('specialities', 'next', 'prev', 'param'));
    }

    private function service($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');
        $this->loadModel('Services');
        $services = $this->Services
            ->find()
            ->where(['Services.status' => 1, 'Services.type' => 'book'])
            ->innerJoinWith('Specialities', function ($q) use ($session) {
                return $q->where(['Specialities.id' => $session->read('Consults.speciality.speciality_id')]);
            })
            ->innerJoinWith('Personals', function ($q) use ($session) {
                return $q->where(['Personals.id' => $session->read('Consults.findPractitioner.personal.id')]);
            });

        if (empty($services->toArray())) {
            $this->Flash->info('Not find services for this speciality.');
            return $this->redirect($this->referer());    
        }

        $next = 'slot';
        $prev = 'speciality';
        if ($this->request->is(['post'])) {
            $session->write('Consults.' . $type, $this->request->getData());
            $service = $this->Services->get($this->request->getData('service_id'));
            $session->write('Consults.service.duration', $service->duration);
            return $this->redirect([$uuid, $next]);
        }
        
        $param[1] = $prev;
        $this->set(compact('services', 'next', 'prev', 'param'));
    }

    private function provider($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');
        $this->loadModel('Users');
        $practitioners = $this->Users
            ->find()
            ->where(['Users.role_id' => 5, 'Users.active' => 1])
            // ->innerJoinWith('Personals.Services', function ($q) use ($session) {
            //     return $q->where(['Services.id' => $session->read('Consults.service.service_id')]);
            // })
            // ->innerJoinWith('Personals.Specialities', function ($q) use ($session) {
            //     return $q->where(['Specialities.id' => $session->read('Consults.speciality.speciality_id')]);
            // })
            ->contain(['Personals'])
            ->toArray();

        if (empty($practitioners)) {
            $this->Flash->info('Find provider is empty');
            return $this->redirect($this->referer());
        }

        if ($this->request->is(['post'])) {
            if ($this->request->getData('practitioner_id') == null) {
                $findPractitioner = $this->findProvider();
                if (!empty($findPractitioner)) {
                    $session->write('Consults.findPractitioner', $findPractitioner);
                }

            }else{
                $findPractitioner = $this->Users->get($this->request->getData('practitioner_id'), ['contain' => ['Personals']]);
                $session->write('Consults.findPractitioner', $findPractitioner);
            }
        }
        $next = 'speciality';
        $prev = 'patient';

        if ($this->request->is(['post'])) {
            $session->write('Consults.' . $type, $this->request->getData());
            return $this->redirect([$uuid, $next]);
        }
        
        $param[1] = $prev;
        $this->set(compact('practitioners', 'next', 'prev', 'param'));
    }

    public function findProvider()
    {
        $session = $this->getRequest()->getSession();
        $this->loadModel('Users');
        $practitioners = $this->Users
            ->find()
            ->where(['Users.role_id' => 5, 'Users.active' => 1])
            ->contain(['Personals']);

        $collection = new Collection($practitioners);
        return $practitioners->sample(1)->first();
    }

    public function listSlot()
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');
        $now = Time::now();
        $times = [];
        if ($this->request->getQuery('date')) {
            $this->loadModel('Personals');
            $findPersonal = $this->Personals->get($session->read('Consults.findPractitioner.personal.id'));
            $chooseDate = new Time($this->request->getQuery('date'));
            if (!empty($findPersonal->regular_hours)) {
                $regular_hours = unserialize($findPersonal->regular_hours);
                $getTimeDataNow = $regular_hours[$chooseDate->format('l')];
                if (!empty($getTimeDataNow)) {
                    $getTimeDataNow = explode(',', $getTimeDataNow);
                    foreach ($getTimeDataNow as $arr) {
                        $strTime = explode('-', $arr);
                        $startR = new Time($strTime[0]);
                        $endR = new Time($strTime[1]);
                        if (isset($startR) && isset($endR)) {
                            for ($i=$startR->format('H'); $i <= $endR->format('H'); $i++) { 
                                if ($i > $now->hour && strtotime($this->request->getQuery('date')) == strtotime($now->format('Y-m-d'))) {
                                    $times[] = $i . ':00';
                                }

                                if (strtotime($this->request->getQuery('date')) != strtotime($now->format('Y-m-d'))) {
                                    $times[] = $i . ':00';
                                }
                            }
                        }
                    }
                    
                }
            }

            if (!empty($findPersonal->override_hours)) {
                $override_hours = unserialize($findPersonal->override_hours);
                foreach ($override_hours as $value) {
                    $startO = new Time($value['start']);
                    $endO = new Time($value['end']);
                    $endO = $endO->format('H') <= 24 ? $endO->format('H') : 24;

                    if (strtotime($startO->format('Y-m-d')) == strtotime($this->request->getQuery('date'))) {
                        if ($startO->format('H') < $endR->format('H')) {
                            unset($times);
                            $times = [];
                        }
                        if (strtotime($this->request->getQuery('date')) == strtotime($now->format('Y-m-d'))) {
                            for ($i=$now->hour; $i <= $endO ; $i++) { 
                                $ntimes[] = $i . ':00';
                            }
                        }else{
                            for ($i=$startO->format('H'); $i <= $endO ; $i++) { 
                                $ntimes[] = $i . ':00';
                            }
                        }
                        if (!empty($ntimes)) {
                            $times = array_merge($times, $ntimes);
                        }
                        
                    }
                }
            }
            
        }
        $this->set(compact('times', 'param'));
    }

    public function slot($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');
        $next = 'details';
        $prev = 'provider';
        $now = Time::now();
        
        if ($this->request->is('post')) {
            $createDate = new Time(__('{date} {time}', $this->request->getData()));
            if (strtotime($createDate) < strtotime($now)) {
                $this->Flash->error('Time input error');
                return $this->redirect($this->referer());
            }

            $session->write('Consults.' . $type, $this->request->getData());
            return $this->redirect([$uuid, $next]);
        }        
        
        $param[1] = $prev;
        $this->set(compact('next', 'prev', 'param'));
    }

    private function details($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');

        $this->loadModel('Specialities');
        $detail = $this->Specialities->get($session->read('Consults.speciality.speciality_id'));

        $this->loadModel('Services');
        
        if ($session->read('Consults.speciality.type_booking') == 'book_appointment') {
            if ($session->read('Consults.service.service_id')) {
                $services = $this->Services->get($session->read('Consults.service.service_id'));
            }
            $next = 'review';
            $prev = 'slot';
        }else{
            $next = 'payment';
            $prev = 'speciality';
        }

        if ($this->request->is('post')) {
            $session->write('Consults.' . $type, $this->request->getData());
            return $this->redirect([$uuid, $next]);
        }        
        
        $param[1] = $prev;
        $this->set(compact('services', 'detail', 'next', 'prev', 'param'));
    }

    private function review($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');

        $this->loadModel('Services');
        $services = $this->Services
            ->find()
            ->where(['Services.id' => $session->read('Consults.service.service_id')])
            ->first();
        // $this->loadModel('Countries');
        // $countries = $this->Countries
        //     ->find()
        //     ->where(['Countries.countryCode' => $session->read('Consults.location.location_id')])
        //     ->first();

        $this->loadModel('Specialities');
        $specialities = $this->Specialities
            ->find()
            ->where(['Specialities.id' => $session->read('Consults.speciality.speciality_id')])
            ->first();

        $this->loadModel('Patients');
        $patients = $this->Patients
            ->find()
            ->where(['Patients.id' => $session->read('Consults.patient.patient_id')])
            ->first();
        $next = 'payment';
        $prev = 'slot';

        if ($this->request->is('post')) {
            $session->write('Consults.' . $type, $this->request->getData());
            return $this->redirect([$uuid, $next]);
        }        
        
        $param[1] = $prev;
        $this->set(compact('services', 'specialities', 'patients', 'detail', 'next', 'prev', 'param'));
    }

    private function payment($uuid, $type)
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');

        $this->loadModel('Services');
        $service = $this->Services
            ->find()
            ->where(['Services.id' => $session->read('Consults.service.service_id')])
            ->first();
        $this->loadModel('Countries');
        $countries = $this->Countries
            ->find()
            ->where(['Countries.countryCode' => $session->read('Consults.location.location_id')])
            ->first();

        $this->loadModel('Specialities');
        $specialities = $this->Specialities
            ->find()
            ->where(['Specialities.id' => $session->read('Consults.speciality.speciality_id')])
            ->first();
        $this->loadModel('Patients');
        $patients = $this->Patients
            ->find()
            ->where(['Patients.id' => $session->read('Consults.patient.patient_id')])
            ->first();
        if ($session->read('Consults.speciality.type_booking') == 'book_appointment') {
            $next = 'checkout';
            $prev = 'review';
        }else{
            $services = $this->Services
                ->find()
                ->where(['Services.status' => 1, 'Services.type' => 'as_soon_as'])
                ->toArray();
            $next = 'checkout';
            $prev = 'details';
        }
        
        if ($this->request->is('post')) {
            $consults = $session->read('Consults');
            $createDate = new Time(__('{date} {time}', $consults['slot']));
            $data = [
                'patient_id' => $consults['patient']['patient_id'],
                'service_id' => $consults['service']['service_id'],
                'uuid' => $consults['uuid'],
                'practitioner_id' => $consults['findPractitioner']['personal']['id'],
                'status' => 'Booked',
                'type' => 'Online',
                'location' => 'Online Consultation',
                'description' => serialize($consults['details']),
                'data_save' => serialize($consults),
                'date' => $createDate->format('Y-m-d'),
                'start_time' => $consults['slot']['time'],
                'day' => $createDate->format('l'),
                'duration' => $consults['service']['duration'],
                'order' => [
                    'practitioner_id' => $consults['findPractitioner']['id'],
                    'amount' => $service->price,
                    'user_id' => $this->AuthUser->user('id'),
                    'full_name' => $this->AuthUser->user('full_name'),
                    'email' => $this->AuthUser->user('email'),
                    'status' => 'Checkout'
                ]
            ];
            $appointment = $this->Appointments->newEntity($data, ['associated' => ['Orders']]);

            if ($this->Appointments->save($appointment)) {
                $appointment = $this->Appointments->get($appointment->id, ['contain' => ['Personals', 'Services', 'Patients' => ['Users'], 'Orders']]);
                $session->write('Booking', $appointment);
                $session->delete('Consults');
            }
            return $this->redirect([$uuid, $next]);
        }
        
        $param[1] = $prev;
        $this->set(compact('service','countries', 'specialities', 'patients', 'detail', 'next', 'prev', 'param'));
    }

    private function checkout()
    {
        $session = $this->getRequest()->getSession();
        $param = $this->request->getParam('pass');

        $this->loadModel('Orders');
        $order = $this->Orders
            ->find()
            ->where(['Orders.appointment_id' => $session->read('Booking.id')])
            ->first();
        if ($order->payment_status) {
            return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
        }
        $this->loadModel('Services');
        if (unserialize($session->read('Booking.data_save'))['speciality']['type_booking'] == 'book_appointment') {
            $services = $this->Services->get(unserialize($session->read('Booking.data_save'))['service']['service_id']);
        }else{
            $services = $this->Services->get(unserialize($session->read('Booking.data_save'))['payment']['service_id']);
        }
        $next = 'confirm';
        $prev = 'payment';

        $paypalEnv       = PAYPAL_SANDBOX?'sandbox':'production'; 
        $paypalURL       = PAYPAL_SANDBOX?'https://api.sandbox.paypal.com/v1/':'https://api.paypal.com/v1/'; 
        $paypalClientID  = PAYPAL_API_CLIENT_ID; 
        $paypalSecret   = PAYPAL_API_SECRET; 
        $param[1] = $prev;

        

        $this->set(compact('services', 'next', 'prev', 'param', 'paypalEnv', 'paypalURL', 'paypalClientID', 'paypalSecret', 'order'));
        
    }
    
    public function validate($paymentID, $paymentToken, $payerID, $productID){ 
        $this->autoRender = false;

        $paypalEnv       = PAYPAL_SANDBOX?'sandbox':'production'; 
        $paypalURL       = PAYPAL_SANDBOX?'https://api.sandbox.paypal.com/v1/':'https://api.paypal.com/v1/'; 
        $paypalClientID  = PAYPAL_API_CLIENT_ID; 
        $paypalSecret   = PAYPAL_API_SECRET; 

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $paypalURL.'oauth2/token'); 
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_USERPWD, $paypalClientID.":".$paypalSecret); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials"); 
        $response = curl_exec($ch); 
        curl_close($ch); 
         
        if(empty($response)){ 
            return false; 
        }else{ 
            $jsonData = json_decode($response); 
            $curl = curl_init($paypalURL.'payments/payment/'.$paymentID); 
            curl_setopt($curl, CURLOPT_POST, false); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
            curl_setopt($curl, CURLOPT_HEADER, false); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, array( 
                'Authorization: Bearer ' . $jsonData->access_token, 
                'Accept: application/json', 
                'Content-Type: application/xml' 
            )); 
            $response = curl_exec($curl); 
            curl_close($curl); 
             
            // Transaction data 
            $result = json_decode($response); 
             
            return $result; 
        } 
     
    } 

    public function process(){
        $this->autoRender = false;

        if (!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) && !empty($_GET['pid'])) {
            $paymentID = $_GET['paymentID']; 
            $token = $_GET['token']; 
            $payerID = $_GET['payerID']; 
            $productID = $_GET['pid']; 
            
            $paymentCheck = $this->validate($paymentID, $token, $payerID, $productID); 
            $status = 'Failed';
            if ($paymentCheck && $paymentCheck->state == 'approved') {
                $id = $paymentCheck->id; 
                $state = $paymentCheck->state; 
                $payerFirstName = $paymentCheck->payer->payer_info->first_name; 
                $payerLastName = $paymentCheck->payer->payer_info->last_name; 
                $payerName = $payerFirstName.' '.$payerLastName; 
                $payerEmail = $paymentCheck->payer->payer_info->email; 
                $payerID = $paymentCheck->payer->payer_info->payer_id; 
                $payerCountryCode = $paymentCheck->payer->payer_info->country_code; 
                $paidAmount = $paymentCheck->transactions[0]->amount->details->subtotal; 
                $currency = $paymentCheck->transactions[0]->amount->currency; 
                $status = 'Paid';
            }

            $this->loadModel('Orders');
            $order = $this->Orders->get($productID);
            if ($order->payment_status) {
                return $this->redirect(['controller' => 'Dashboards', 'action' => 'index']);
            }
            $amount = number_format($paidAmount, 0, '.', '');
            if ($order->amount >= (int)$amount) {
                $data = array( 
                    'product_id' => $productID, 
                    'txn_id' => $id, 
                    'payment_gross' => $paidAmount, 
                    'currency_code' => $currency, 
                    'payer_id' => $payerID, 
                    'payer_name' => $payerName, 
                    'payer_email' => $payerEmail, 
                    'payer_country' => $payerCountryCode, 
                    'payment_status' => $state 
                );
                $order->ref_code = serialize($data);
                $order->status = $status;
                $order->payment_status = 1;
                $order->pay_type = 'paypal';
                $this->Orders->save($order);
                $session = $this->getRequest()->getSession();
                $this->getMailer('Appointment')->send('bookingComplete', [$session->read('Booking')->toArray()]);
            }
        }
        return $this->redirect(['action' => 'paymentStatus']);
    }

    public function paymentStatus(){
        $session = $this->getRequest()->getSession();
        $order = $this->Appointments->Orders
            ->find()
            ->where(['Orders.appointment_id' => $session->read('Booking.id')])
            ->first();
        $paymentData = unserialize($order->ref_code);

        $appointment = $this->Appointments->get($session->read('Booking.id'), [
            'contain' => ['Orders', 'Patients.Users', 'Personals', 'Services'],
        ]);

        $this->loadModel('Services');
        $services = $this->Services->get(unserialize($appointment->data_save)['service']['service_id']);

        $this->loadModel('Specialities');
        $specialities = $this->Specialities
            ->find()
            ->where(['Specialities.id' => unserialize($appointment->data_save)['speciality']['speciality_id']])
            ->first();
        $this->loadModel('Patients');
        $patients = $this->Patients
            ->find()
            ->where(['Patients.id' => unserialize($appointment->data_save)['patient']['patient_id']])
            ->first();

        $this->set(compact('appointment', 'services', 'specialities', 'patients', 'paymentData'));
    }

    public function stripe()
    {
        $this->autoRender = false;

        require_once(ROOT . DS . 'src' . DS . "Vendor" . DS . "stripe/vendor/stripe/stripe-php/init.php"); 

        $session = $this->getRequest()->getSession();
        $order = $session->read('Booking');
        $this->loadModel('Services');
        if (unserialize($session->read('Booking.data_save'))['speciality']['type_booking'] == 'book_appointment') {
            $service = $this->Services->get(unserialize($session->read('Booking.data_save'))['service']['service_id']);
        }

        if (unserialize($session->read('Booking.data_save'))['speciality']['type_booking'] == 'as_soon_as_possible') {
            $service = $this->Services->get(unserialize($session->read('Booking.data_save'))['payment']['service_id']);
        }
        

        \Stripe\Stripe::setApiKey('sk_test_51INSz7HvEEpwZjF0eJLhiBkiAmpxoOcAVg3pKUYL6cacYCLMUUxby8GNeLR00gjAyNfzYNqlkgvVWgUZFlq3Kou6001pBPZHaz');
        
        header('Content-Type: application/json');
        try {
          // retrieve JSON from POST body
          $json_str = file_get_contents('php://input');
          $json_obj = json_decode($json_str);
          $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => $order->amount * 100,
            'currency' => 'usd',
            'metadata' => [
                'order_id' => $order->id,
                'description' => $service->title
              ]
          ]);
          $output = [
            'clientSecret' => $paymentIntent->client_secret,
          ];
          echo json_encode($output);
        } catch (Error $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }

    function webhook() {
        $this->autoRender = false;

        require_once(ROOT . DS . 'src' . DS . "Vendor" . DS . "stripe/vendor/stripe/stripe-php/init.php"); 
        \Stripe\Stripe::setApiKey('sk_test_51INSz7HvEEpwZjF0eJLhiBkiAmpxoOcAVg3pKUYL6cacYCLMUUxby8GNeLR00gjAyNfzYNqlkgvVWgUZFlq3Kou6001pBPZHaz');
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = 'whsec_lxiduoQcyZgD0gIXxxxhSbHmtOiUFab7';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
          $event = \Stripe\Event::constructFrom(
            json_decode($payload, true)
          );
            $appointment = $this->Appointments->get(json_decode(json_encode($event['data']['object']['charges']['data'][0]['metadata']['order_id'])));
            if (!empty($appointment)) {
                $appointment->stripe_status = json_encode($event);
                $this->Appointments->save($appointment);
            }else{
                 $appointment = $this->Appointments->newEntity();
                 $appointment->stripe_status = json_encode($event);
                $this->Appointments->save($appointment);
            }

        } catch(\UnexpectedValueException $e) {
          // Invalid payload
          http_response_code(400);
          exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
          // Invalid signature
          http_response_code(400);
          exit();
        }

        // Handle the event
        echo 'Received unknown event type ' . $event->type;

        http_response_code(200);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $appointments = $this->Appointments
            ->find()
            ->where(['Patients.user_id' => $this->AuthUser->user('id')])
            ->contain(['Personals', 'Patients'])
            ->order(['Appointments.id' => 'DESC']);

        $combined = (new Collection($appointments))->combine(
            'id', 
            function ($entity) { 
                return $entity;
            },
            function ($entity) { 
                return $entity->date->format('M d, Y');
            })
        ->toArray();

        $this->set(compact('combined'));
    }

    /**
     * View method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\AppointmentNotFoundException When appointment not found.
     */
    public function view($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => ['Orders', 'Patients.Users', 'Personals', 'Services'],
        ]);
        //$viewVars = $appointment->toArray();
        //$this->getMailer('Appointment')->send('bookingComplete', [$viewVars]);
        //$this->getMailer('Appointment')->send('connectZoom', [$appointment, $viewVars]);
        $this->loadModel('Services');
        $services = $this->Services->get(unserialize($appointment->data_save)['service']['service_id']);

        $this->loadModel('Specialities');
        $specialities = $this->Specialities
            ->find()
            ->where(['Specialities.id' => unserialize($appointment->data_save)['speciality']['speciality_id']])
            ->first();
        $this->loadModel('Patients');
        $patients = $this->Patients
            ->find()
            ->where(['Patients.id' => unserialize($appointment->data_save)['patient']['patient_id']])
            ->first();

        $this->set(compact('appointment', 'services', 'specialities', 'patients'));
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
        $this->set(compact('appointment', 'patients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appointment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\AppointmentNotFoundException When appointment not found.
     */
    public function edit($id = null)
    {
        $appointment = $this->Appointments->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $appointment = $this->Appointments->patchEntity($appointment, $this->request->getData());
            if ($this->Appointments->save($appointment)) {
                $this->Flash->success(__('The appointment has been saved.'));

                return $this->redirect(['controller' => 'Notifications', 'action' => 'index']);
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
     * @throws \Cake\Datasource\Exception\AppointmentNotFoundException When appointment not found.
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
