<h3><?= __( "Chat Server", 'wp-live-chat-support' ) ?></h3>
<table class="wp-list-table wplc_list_table widefat fixed striped pages">
    <tbody>
    <tr>
        <td width="250" valign="top">
            <label for="wplc_channel"><?= __( "Select your chat server", 'wp-live-chat-support' ); ?> <i
                        class="fa fa-question-circle wplc_light_grey wplc_settings_tooltip"
                        title="<?= __( 'Choose between 3CX servers or your Wordpress server for chat delivery', 'wp-live-chat-support' ); ?>"></i></label>
        </td>
        <td valign="top">
			<?php if(in_array('mcu',explode(',',WPLC_ENABLE_CHANNELS )) && !$disable_chat_server ){ ?>
            <input type="radio" name="wplc_channel"
                   value="mcu" <?= $wplc_settings->wplc_channel=='mcu' ? "checked":"" ?>><?=__("Standalone - No 3CX",'wp-live-chat-support');?><br>
            <p></p>
			<?php }?>
	        <?php if(in_array('phone',explode(',',WPLC_ENABLE_CHANNELS ))){ ?>
                <input type="radio" name="wplc_channel"
                       value="phone" <?= $wplc_settings->wplc_channel=='phone' ? "checked":"" ?>><?=__("3CX",'wp-live-chat-support');?> <br>
                <p></p>
	        <?php }?>

            <input type="text" value="<?= $channel_url ?>" id="wplc_channel_url_input"
                   placeholder="<?= __( "3CX Click2Talk URL", 'wp-live-chat-support' ); ?>" name="wplc_channel_url"><br>
        </td>
    </tr>
    <tr class="wplc_pbx_mode_settings_area">
        <td width="250" valign="top">
            <label><?= __( "Allow Video or Voice Calls", 'wp-live-chat-support' ); ?> </label>
        </td>
        <td valign="top">
            <div class="col-md-6 form-group" >
                <h1 class="col-form-label"></h1>
                <div class="wplc-c2cmode-selection">
                    <input type="radio" value="chat" name="wplc_pbx_mode" id="wplc_c2c_mode_chat" <?= checked( $wplc_pbx_mode, 'chat' ) ?>>
                    <label id="wplc_c2c_mode_chat_label" for="wplc_c2c_mode_chat">
                        <?=__("Chat Only",'wp-live-chat-support');?>
                    </label>
                </div>
                <div class="wplc-c2cmode-selection">
                    <input type="radio" value="phonechat" name="wplc_pbx_mode" id="wplc_c2c_mode_phonechat" <?= checked( $wplc_pbx_mode, 'phonechat' ) ?>>
                    <label id="wplc_c2c_mode_phone_label" for="wplc_c2c_mode_phonechat">
	                    <?=__("Phone and Chat",'wp-live-chat-support');?>
                    </label>
                </div>
                <div class="wplc-c2cmode-selection">
                    <input type="radio" value="phone" name="wplc_pbx_mode" id="wplc_c2c_mode_phone" <?= checked( $wplc_pbx_mode, 'phone' ) ?>>
                    <label id="wplc_c2c_mode_phone_label" for="wplc_c2c_mode_phone">
	                    <?=__("Phone Only",'wp-live-chat-support');?>
                         </label>
                </div>


                <div class="wplc-c2cmode-selection">
                    <input type="radio" value="all" name="wplc_pbx_mode" id="wplc_c2c_mode_all" <?= checked( $wplc_pbx_mode, 'all' ) ?>>
                    <label id="wplc_c2c_mode_all_label" for="wplc_c2c_mode_all">
	                    <?=__("Video, Phone and Chat",'wp-live-chat-support');?>
                    </label>
                </div>
            </div>
        </td>

    </tr>
    <tr class="wplc_pbx_mode_settings_area">
        <td>
		    <?= __( "Ignore queue ownership", 'wp-live-chat-support' ); ?>
        </td>
        <td>
                <input type="checkbox" class="wplc_check" name="wplc_ignore_queue_ownership" value="1"<?= ( $wplc_settings->wplc_ignore_queue_ownership ? ' checked' : '' ); ?>/>
        </td>
    </tr>
    </tbody>
</table>