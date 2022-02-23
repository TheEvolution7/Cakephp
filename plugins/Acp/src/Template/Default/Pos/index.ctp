<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <style type="text/css">
                div.dataTables_filter label,
                div.dataTables_length label{
                    display: flex;
                    align-items: center;
                }
                div.dataTables_filter input,
                div.dataTables_length select{
                    height: calc(1.5em + 1.3rem + 2px);
                    margin-left: 15px
                }
                div.dataTables_length select{
                    margin-right: 15px
                }
                .dataTables_wrapper .dataTable th, .dataTables_wrapper .dataTable td{
                    color: #212529
                }
                
            </style>
            <div class="row">
                <div class="table-sorter-wrapper col-lg-12 table-responsive custom-table">
                    <table class="table table-striped" id="jdatatable" style="width: 100%">
                        <thead>
                            <tr style="width: 100%">
                                <th class="sortStyle text-left"><?= __d('acp', 'Keyword');?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle text-left"><?= __d('acp', 'Traslation String');?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle text-left"><?= __d('acp', 'Actions');?><i class="ti-angle-down"></i></th>
                                <th class="sortStyle text-left"><?= __d('acp', 'Reference');?><i class="ti-angle-down"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($entries as $entry):
                            if (!empty($entry->getMsgId())): ?>
                            <tr>
                                <td>
                                    <?= h($entry->getMsgId());?>
                                </td>
                                <td>
                                    <?= h($entry->getMsgstr());?>
                                </td>
                                <td>
                                    <a class="edit" href="javascript:;"><i class="ti-pencil"></i></a>
                                    <!-- <a style="display: none;" class="edit" href="javascript:;"><i class="ti-pencil"></i></a> -->
                                </td>
                                <td>
                                    <?php 
                                    if(!empty($entry->getReference())){
                                        $ref_string = '';
                                        echo '<ul class="po_ref">';
                                        foreach($entry->getReference() as $ref){
                                            if($ref != $ref_string){
                                                echo '<li>'. $ref .'</li>'; 
                                                $ref_string = $ref;
                                            }
                                        }
                                        echo '</ul>';
                                    }
                                    else{
                                        echo '---'; 
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php endif; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->create(null, [
    'class' => 'ajax-table',
    'url' => [
        'plugin' => 'Acp',
        'controller' => 'pos',
        'action' => 'edit',
        isset($requestParams['pass'][0]) ? $requestParams['pass'][0] : false,
        isset($requestParams['pass'][1]) ? $requestParams['pass'][1] : false,
    ]
]) ?>
<?php 
    $this->Form->unlockField('msgId');
    $this->Form->unlockField('msgStr');
?>
<?= $this->Form->end() ?>


<script>
    $(document).ready(function(e) {
        var table = $('#jdatatable');
        var textEdit = '';

        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table class="table">';
            console.log(aData[1]);
            sOut += '<tr><td>' + aData[4] + '</td></tr>';
            sOut += '</table>';

            return sOut;
        }
        
        var nCloneTh = document.createElement('th');
        nCloneTh.className = "table-checkbox";

        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"><i class="ti-plus"></i></span>';

        table.find('thead tr').each(function () {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        table.find('tbody tr').each(function () {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });
        
        // datatable
        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
        
            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }
        
            oTable.fnDraw();
        }
        
        function editRow(oTable, nRow) {

            var aData = oTable.fnGetData(nRow);
            textEdit = aData[2];

            var jqTds = $('>td', nRow);
            jqTds[1].innerHTML = aData[1] + '<input type="hidden" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<a class="edit" href="javascript:;">Save</a> <a class="cancel" href="">Cancel</a>';
        }
        
        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[1].value, nRow, 2, false);
            
            //console.log(jqInputs);
            //console.log('dsfsfsf');
            //console.log(document.getElementById('editUrl').value);
            //var baseUrl = document.getElementById('baseUrl').value;
            // $.post($('#editUrl').val(), {msgId: jqInputs[0].value, msgStr: jqInputs[1].value}, function(data){
            //  //console.log(data);
            //  var result = JSON.parse(data);
            //  if(result.status == 1)
            //  {
            //      toastr.success(result.msg, 'Notifications');
            //  }
            //  else{
            //      toastr.danger(result.msg, 'Notifications');
            //  }
            // });

            // Form data

            form = $('.ajax-table')
            formData = new FormData(form[0]);
            formData.append('msgId', jqInputs[0].value);
            formData.append('msgStr', jqInputs[1].value);

            // Call ajax
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-Token': $('.ajax-table [name="_csrfToken"]').val(),
                },
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        toastr({
                            heading: 'Notification',
                            text: data.message,
                            icon: 'success'
                        });
                    } else {
                        toastr({
                            heading: 'Notification',
                            text: data.message,
                            icon: 'error'
                        })
                    }
                }
            });

            oTable.fnUpdate('<a class="edit" href=""><i class="ti-pencil"></i></a>', nRow, 3, false);
            oTable.fnDraw();
        }
        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(textEdit, nRow, 2, false);
            oTable.fnUpdate('<a class="edit" href=""><i class="ti-pencil"></i></a>', nRow, 3, false);
            oTable.fnDraw();
        }

        var oTable = $('#jdatatable').dataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [0]
            }],
            "order": [
                [1, 'asc']
            ],
            "lengthMenu": [
                [20, 50, 100, -1],
                [20, 50, 100, "All"] // change per page values here
            ],
            "processing": true,
            "columns": [
                null, 
                null, 
                null,
                null,
                null,
            ],
            "pageLength": 20,
        });
        
        oTable.fnSetColumnVis(4, (false));;
        
        table.on('click', ' tbody td .row-details', function () {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
        
        var nEditing = null;
        
        
        jQuery('#jdatatable_wrapper .dataTables_filter input').addClass("form-control input-medium"); // modify table search input
        jQuery('#jdatatable_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown
        //jQuery('#sample_1_wrapper .dataTables_length select').select2(); // initialize select2 dropdown


        $('#jdatatable').on('click', 'a.cancel', function (e) {
            e.preventDefault();
            
            var nRow = $(this).parents('tr')[0];

            cancelEditRow(oTable, nRow);
            nEditing = null;
        });

        $('#jdatatable').on('click', 'a.edit', function (e) {
                
            e.preventDefault();
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];
            if (nEditing !== null && nEditing != nRow) {

                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;

            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                nEditing = null;
                //alert("Updated! Do not forget to do some ajax to sync with backend :)");

            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
    });
</script>





