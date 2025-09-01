<?php

namespace WordPressAdventure\Admin;

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
                    ?>
                        <div class="adventure-setting">
                            <h3><?= __('Adventure Settings', TEXT_DOMAIN) ?></h3>
                            <input type="text" placeholder="setting">
                            <textarea></textarea>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
    }
}