<div>
    <form action="{{ $action }}" method="post" id="form-submit">
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableRole">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <div class="d-flex justify-content-end">
                <div>
                    <x-button-cancel-modal />
                    <x-button-submit-modal />
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="{{ asset('js/setting/permissions/accessRole.js') }}"></script>
