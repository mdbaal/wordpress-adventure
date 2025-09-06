<?php

namespace WordPressAdventure\Admin;

use function PHPSTORM_META\type;

class AdminPage
{
    public static function render(array $pages, array $settings)
    {
        ?>
            <h2 class="adventure-page-title"><?= __("Customize the adventure", TEXT_DOMAIN);  ?> </h2>
            <div class="adventure-admin">
                <div class="adventure-pages">
                    <h3><?= __('Adventure pages', TEXT_DOMAIN) ?></h3>
                    <div class="adventure-pages-table">
                        <?php
                        foreach($pages as $page){
                        ?>
                            <div class="page-table-row">
                                <div>Title</div>
                                <div>Description</div>
                                <div>Loot</div>
                                <div>Monsters</div>
                                <div>Connections</div>
                                <div>
                                    <a href="#"><span class="material-symbols-outlined">edit</span></a>
                                    <a href="#"><span class="material-symbols-outlined">delete</span></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <hr/>
                <div class="adventure-settings">
                    <?php
                    foreach($settings as $setting){
                        self::getSettingCard($setting);
                    }
                    ?>
                </div>
            </div>
        <?php
    }

    private static function getSettingCard(array $setting){
        $name = $setting['name'];
        $type = $setting['type'];
        $value = $setting['value'];
        $options = $settings['options'] ?? [];

        switch($type){
            case "textarea":
                ?>
                <div class="adventure-setting">
                    <h3><?= $name ?></h3>
                    <textarea value="<?=$value?>">
                </div>
                <?php
                ;
            case "select":
                ?>
                    <div class="adventure-setting">
                    <h3><?= $name ?></h3>
                    <select value="<?=$value?>">
                    <?php
                    foreach($options as $option){
                    ?>
                        <option value="<?= $option ?>"><?= $option ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <?php
                ;
            default:
                ?>
                <div class="adventure-setting">
                    <h3><?= $name ?></h3>
                    <input type="<?= $type ?>" value="<?=$value?>">
                </div>
                <?php

        }
    }
}