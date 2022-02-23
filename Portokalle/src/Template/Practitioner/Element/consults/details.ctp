<?php echo $this->Form->create(); ?>
    <div class="form-container">
        <div class="field flex sm:flex-col">
            <h3 class="field__title w-p25 sm:w-p100 mr-6">
                What are your symptoms
            </h3>
            <div class="field__wrapper grid grid-col-3 sm:grid-col-2 flex-grow item-start">
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" value="Cough/Cold/Flu" name="symptoms[]" />
                    <label for="">Cough/Cold/Flu</label>
                </div>
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" value="Fever" name="symptoms[]"/>
                    <label for="">Fever</label>
                </div>
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" value="Chest Pain" name="symptoms[]" />
                    <label for="">Chest Pain</label>
                </div>
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" value="Absnormal Pain" name="symptoms[]"/>
                    <label for="">Absnormal Pain</label>
                </div>
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" value="Headache" name="symptoms[]"/>
                    <label for="">Headache</label>
                </div>
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" value="Other" name="symptoms[]"/>
                    <label for="">Other</label>
                </div>
                <div class="form-checkbox flex item-center mr-6">
                    <input type="checkbox" class="form-checkbox" value="No Symptoms" name="symptoms[]" />
                    <label for="">No Symptoms</label>
                </div>
            </div>
        </div>
        <div class="field flex sm:flex-col">
            <h3 class="field__title w-p25 sm:w-p100 mr-6">
                Tell us more
            </h3>
            <!-- <div class="field__label">Who is this visit for ?</div> -->
            <div class="field__wrap flex-auto">
                <textarea class="field__textarea" placeholder="Leave your note to doctors" name="description" id="" cols="30" rows="5"></textarea>
            </div>
        </div>

        <?= $this->Html->link(__('Back'), $param, ['class' => 'btn btn_blue']) ?>
        <?= $this->Form->button(__('Next'), ['class' => 'btn btn_blue']) ?>
    </div>
</form>