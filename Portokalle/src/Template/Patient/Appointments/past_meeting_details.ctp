<div class="page2__container">
    <div class="page2__row">
        <div class="page2__col">
            <div class="page6__wrapper">
                <div class="membership-container">
                    <div class="membership-row">
                        <div class="form-build">
                            <div class="form-container">
                                <div class="form-container __review-step">
                                    <h2 class="field__title">
                                        Past Meeting Details
                                    </h2>
                                    <div class="row-cancel box-sumary">
                                        <div class="col-box-12">
                                            <div class="field">
                                                <div class="table-wrap">
                                                    <table>
                                                        <tbody>
                                                            <?php foreach ($meeting as $key => $value): ?>
                                                                <tr>
                                                                    <td><?= \Cake\Utility\Inflector::humanize($key) ?></td>
                                                                    <td><?= $value ?></td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex justify-center btn-step">
    <?= $this->Html->link(__('Back'), ['action' => 'view', $appointment->id], ['class' => 'btn btn_blue __back']) ?>
</div>


