@php
$structureTree = UtilsHelp::createStructureTreePermission();
$hiddenTree = UtilsHelp::handleSidebar($structureTree);

ob_start();
echo UtilsHelp::renderTreePermissions($structureTree, null, $hiddenTree);
$outputTree = ob_get_clean();
@endphp

<div class="dd nestable-with-handle">
    {!! $outputTree !!}
</div>