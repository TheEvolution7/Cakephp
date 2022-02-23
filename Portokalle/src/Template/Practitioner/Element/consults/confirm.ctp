<?php 
    use Cake\I18n\Time;
    $consults = $session->read('Consults');
    $details = '';
    foreach ($consults['details'] as $key => $value) {
        if (is_array($value)) {
            $details .= ucfirst($key) . ': ' . implode(', ', $value);
        }else{
            if ($value != '') {
                $details .= '<br>' . ucfirst($key) . ': ' . $value;
            }
        }
    }

    $time = new Time(__('{year}-{month}-{day} {hour}:{minute}', $consults['time']['date']));
?>
<?php echo $this->Form->create(null, ['action' => 'booking']); ?>
<div class="form-container">
    <div class="field">
        <h3 class="field__title"><?= __('Manager Your Appointment') ?></h3>
        <div class="table-wrap">
            <table>
                <tbody>
                    <?php 
                    foreach ($list_type as $key => $value) {
                        if (!empty($consults[$key])) {
                            echo '<tr>';
                            echo '<td>' . $value . '</td>';
                            switch ($key) {
                                case 'locate':
                                    echo '<td>' . $countries[$consults[$key]['locate_id']] . '</td>';
                                break;

                                case 'patient':
                                    echo '<td>' . $listPatient[$consults[$key]['patient_id']] . '</td>';
                                break;

                                case 'details':
                                    echo '<td>' . $details . '</td>';
                                break;

                                case 'time':
                                    echo '<td>' . $time->nice() . '</td>';
                                break;

                                case 'practitioner':
                                    echo '<td>' . $listPractitioner[$consults[$key]['practitioner_id']] . '</td>';
                                break;
                                
                                default:
                                    echo '<td>' . implode(', ', $consults[$key]) . '</td>';
                                break;
                            }
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue']) ?>
    <?= $this->Form->button(__('Book An Appointment'), ['class' => 'btn btn_blue']) ?>
</div>
<? echo $this->Form->end();
