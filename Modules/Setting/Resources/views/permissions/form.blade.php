<div>
    <form action="{{ $action }}" method="post" id="form-submit">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <x-form-checkbox-vertical label="Apakah Menu ini induk ?" name="isnode_mpermissions"
                        placeholder="Nama Aplikasi..."
                        checked="{{ isset($menu) ? ($menu->isnode_mpermissions != null && $menu->isnode_mpermissions != 0 ? 'checked' : '') : '' }}"
                        labelInput="Iya" />
                </div>
                <div class="col-lg-6">
                    <x-form-checkbox-vertical label="Apakah Menu ini sebagai children ?" name="ischildren_mpermissions"
                        placeholder="Nama Aplikasi..."
                        checked="{{ isset($menu) ? ($menu->ischildren_mpermissions != null && $menu->ischildren_mpermissions != 0 ? 'checked' : '') : '' }}"
                        labelInput="Iya" />
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2 {{ isset($menu) ? (($menu->ischildren_mpermissions != null && $menu->ischildren_mpermissions != 0) || $menu->ischildren_mpermissions == 1 ? '' : 'd-none') : 'd-none' }}"
                id="form-menu_root_id">
                <x-form-select-vertical label="Daftar Menu" name="menu_root" :data="$array_menu"
                    value="{{ isset($menu) ? (($menu->ischildren_mpermissions != null && $menu->ischildren_mpermissions != 0) || $menu->ischildren_mpermissions == 1 ? $menu->root_mpermissions : '') : '' }}"
                    class="select2" />
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2 {{ isset($menu) ? (($menu->isnode_mpermissions != null && $menu->isnode_mpermissions != 0) || $menu->isnode_mpermissions == 1 ? '' : 'd-none') : '' }}"
                id="form-menu_children_id">
                <label for="" class="form-label">List Management Menu</label>
                <div class="table-responsive">
                    <table class="table" id="tableListMenu" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Menu</th>
                                <th>Link</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <x-form-input-vertical label="Nama Menu" name="nama_mpermissions" placeholder="Nama menu..."
                value="{{ isset($menu) ? $menu->nama_mpermissions : '' }}" />
            <x-form-input-vertical label="Link" name="link_mpermissions" placeholder="Link menu..."
                value="{{ isset($menu) ? $menu->link_mpermissions : '' }}" />

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
<script class="url_datatable" data-url="{{ route('permissions.dataTable') }}"></script>
<script class="data_datatable"
    data-table="{{ isset($menu) ? ($menu->link_mpermissions != null && $menu->link_mpermissions != 0 ? $menuChildren : '') : '' }}">
</script>
<script type="text/javascript" src="{{ asset('js/setting/permissions/form.js') }}"></script>
