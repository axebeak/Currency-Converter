<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerNT7BDkh\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerNT7BDkh/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerNT7BDkh.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerNT7BDkh\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerNT7BDkh\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'NT7BDkh',
    'container.build_id' => '802fcbc2',
    'container.build_time' => 1554464053,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerNT7BDkh');
