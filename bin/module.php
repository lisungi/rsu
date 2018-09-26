<?php
AddModules('programmes-utilisateurs');

foreach (GetModulePerm() as $item) {
    var_dump($item);
}
