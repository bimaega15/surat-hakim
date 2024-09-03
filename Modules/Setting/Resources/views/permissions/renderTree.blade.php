@php
$structureTree = UtilsHelp::createStructureTreePermission();
$hiddenTree = UtilsHelp::handleSidebar($structureTree);

ob_start();
echo UtilsHelp::renderTreePermissions($structureTree, null, $hiddenTree);
$outputTree = ob_get_clean();
@endphp

<div class="clearfix m-b-20">
    <div id="output_menu">
        <div class="dd nestable-with-handle">
            {!! $outputTree !!}
        </div>
    </div>
</div>
<script class="url_rendermenu_form" data-url="{{ route('permissions.renderTree') }}"></script>
<script class="url_sortAndNested" data-url="{{ route('permissions.sortAndNested') }}"></script>
<script src="{{ asset('js/setting/permissions/nested.js') }}"></script>