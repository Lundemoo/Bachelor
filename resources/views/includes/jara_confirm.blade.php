<!-- ########################### Initiere bekreftelsesboks ########################-->
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">{{trans('general.confirmAction')}}</h3>
            </div> <!-- End Modal Header -->
            <div class="modal-body">
                <p>{{trans('general.areusure')}}</p>
            </div> <!-- End Modal Body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('general.cancel')}}</button>
                <button type="button" class="btn btn-danger" id="confirm"><x>{{trans('general.yes')}}</x></button>
            </div> <!-- End Modal Footer -->
        </div> <!-- End Modal Content -->
    </div> <!-- End Modal Dialog -->
</div> <!-- End Modal -->



<!-- Javascript functions to control modal data injection -->
<script type="text/javascript">
    $('#confirmDelete').on('show.bs.modal', function (e) {
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body p').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);

        // Grab custom settings from submission
        // Button Text for action button
        $btntxt = $(e.relatedTarget).attr('data-btntxt');
        $(this).find('.modal-footer x').text($btntxt);
        // Cancel Button Class
        $btncan = $(e.relatedTarget).attr('data-btncancel');
        // Primary Action Button Class
        $btnac = $(e.relatedTarget).attr('data-btnaction');

        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');
        
        $(this).find('.modal-footer #confirm').data('form', form);
    });

    <!-- Form bekreftelse (yes/ok) handler, submits form -->
    $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        var all = document.getElementById('gjemt').value;
        window.location.replace(all);
    });
</script>
