<div>
    <form action="{{ $action }}" method="post" id="form-submit">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <x-form-checkbox-vertical label="Apakah Menu ini induk ?" name="is_node" placeholder="Nama Aplikasi..."
                        checked="{{ isset($menu) ? ($menu->is_node != null && $menu->is_node != 0 ? 'checked' : '') : '' }}" labelInput="Iya" />
                </div>
                <div class="col-lg-6">
                    <x-form-checkbox-vertical label="Apakah Menu ini sebagai children ?" name="is_children"
                        placeholder="Nama Aplikasi..."
                        checked="{{ isset($menu) ? ($menu->is_children != null && $menu->is_children != 0 ? 'checked' : '') : '' }}"
                        labelInput="Iya" />
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2 {{ isset($menu) ? (($menu->is_children != null && $menu->is_children != 0) || $menu->is_children == 1 ? '' : 'd-none') : 'd-none' }}"
                id="form-menu_root_id">
                <x-form-select-vertical label="Daftar Menu" name="menu_root" :data="$array_menu" value="{{ isset($menu) ? (($menu->is_children != null && $menu->is_children != 0) || $menu->is_children == 1 ? $menu->menu_root : '') : '' }}"
                    class="select2" />
            </div>
            <div class="col-span-12 sm:col-span-12 mb-2 {{ isset($menu) ? (($menu->is_node != null && $menu->is_node != 0) || $menu->is_node == 1 ? '' : 'd-none') : '' }}"
                id="form-menu_children_id">
                <label for="" class="form-label">List Management Menu</label>
                <div class="table-responsive">
                    <table class="table" id="tableListMenu" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Menu</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <x-form-input-vertical label="Nama Menu" name="nama_menu" placeholder="Nama menu..."
                value="{{ isset($menu) ? $menu->nama_menu : '' }}" />
            <x-form-input-vertical label="Icon" name="icon_menu" placeholder="Icon menu..."
                value="{!! isset($menu) ? $menu->icon_menu : '' !!}" />
            <x-form-input-vertical label="Link" name="link_menu" placeholder="Link menu..."
                value="{{ isset($menu) ? $menu->link_menu : '' }}" />

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
<script class="url_datatable" data-url="{{ route('menu.dataTable') }}"></script>
<script class="data_datatable"
    data-table="{{ isset($menu) ? (($menu->children_menu != null && $menu->children_menu != 0) ? $menuChildren : '') : '' }}"></script>
<script type="text/javascript" src="{{ asset('js/setting/menu/form.js') }}"></script>
