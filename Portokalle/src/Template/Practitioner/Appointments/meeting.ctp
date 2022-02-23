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
                                        Meeting details
                                    </h2>
                                    <div class="row-cancel box-sumary">
                                        <div class="col-box-12">
                                            <div class="field">
                                                <div class="table-wrap">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Id</td>
                                                                <td><?= $meeting->id ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Topic</td>
                                                                <td><?= $meeting->topic ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Join URL</td>
                                                                <td><a href="<?= $meeting->join_url ?>" target="_blank"><?= $meeting->join_url ?></a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Meeting Password</td>
                                                                <td><?= $meeting->password ?></td>
                                                            </tr>
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


