<?php echo $this->Form->create(null, ['id' => 'form']); ?>
<div class="user-step-status">
    <?= __('Approximate time to see the provider: 10 minutes') ?>
</div>
<div class="form-container">
    <div class="field">
        <h3 class="field__title ta-left"><?= __('Who is this visit for ?') ?></h3>
        <p id="l"></p>
        <div class="field__wrap">
            <div class="profiles-body md:grid-col-4">
                <?php foreach ($patients as $key => $patient): ?>
                    <input type="radio" id="patient-<?= $key ?>" class="hidden" name="patient_id" value="<?= $patient->id ?>" required/>
                    <label for="patient-<?= $key ?>">
                        <div class="profile-wrapper">
                            <div class="profile-image">
                                <?php $image = $this->Url->build('/uploads/patients/' . $patient->id . DS . $patient->image);?>
                                <?php if (!file_exists(WWW_ROOT . '/uploads/patients/' . $patient->id . DS . $patient->image)): ?>
                                    <div class="no-img">
                                        <?php 
                                            $str = explode(' ', $patient->full_name);
                                            $arr = '';
                                            foreach ($str as $s) {
                                                $arr .= substr($s, 0, 1);
                                            }
                                            echo $arr;
                                        ?>
                                    </div>
                                <?php else: ?>
                                    <img class="settings__pic" src="<?= $image ?>" alt="" />
                                <?php endif ?>
                            </div>
                            <div class="profile-name"><?= $patient->full_name ?></div>
                            <div class="profile-age-gender">
                                <?= __('{0} Years Old {1}', date('Y') - $patient->date_of_birth->format('Y'), ucfirst($patient->sex)) ?>
                            </div>
                            <div class="profile-relationship">
                                <?= ucfirst($patient->relationship) ?>
                            </div>
                        </div>
                    </label>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- <div class="flex justify-center btn-step">
        <?= $this->Html->link(__('Back'), ['controller' => 'Dashboards', 'action' => 'index'], ['class' => 'btn btn_blue __back']) ?>
        <?= $this->Form->button(__('Continue to Speciality'), ['class' => 'btn btn_blue __next']) ?>
    </div> -->
</div>
<?= $this->Form->end();?>

<script>
    $(document).ready(function() {
        $("input:radio").change(function(){
            $("#form").submit();
        });
    });
</script>

<!-- <?php if (empty($_SESSION['Consults']['locate']['locate_id'])): ?>
    <?= $this->Form->hidden('locate.locate_id', ['id' => 'locate']) ?>
    <script>
        var x=document.getElementById("locate");
        var y=document.getElementById("l");
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
        else{
            x.innerHTML="Geolocation is not supported by this browser.";
        }

        function showPosition(position){
            lat=position.coords.latitude;
            lon=position.coords.longitude;
            displayLocation(lat,lon);
        }

        function showError(error){
            window.location.href = "<?= $this->Url->build(['controller' => 'Appointments', 'action' => 'consults', $_SESSION['Consults']['uuid'], 'locate']) ?>";
        }

        function displayLocation(latitude,longitude){
            var geocoder;
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(latitude, longitude);

            geocoder.geocode(
                {'latLng': latlng}, 
                function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var add= results[0].formatted_address ;
                            var  value=add.split(",");

                            count=value.length;
                            country=value[count-1];
                            state=value[count-2];
                            city=value[count-3];
                            x.value = value;
                            y.innerHTML = value;
                        }
                        else  {
                            x.value = "address not found";
                        }
                    }
                    else {
                        x.value = "Geocoder failed due to: " + status;
                    }
                }
            );
        }
    </script>

    <script src="https://maps.google.com/maps/api/js?key="></script>
<?php endif ?> -->



