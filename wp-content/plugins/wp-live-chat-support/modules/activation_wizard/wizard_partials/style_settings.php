<div class="wizard_body">
    <div class="row">
        <div class="col-md-6 wplc_colorpickers">
            <div class="row">
                <div class="form-group offset-md-3 col-md-6">
                    <label class="col-form-label wplc_colorpicker_label"
                           for="base_color"><?= __( "Base color", 'wp-live-chat-support' ) ?></label>
                    <input class="form-control wplc_style_colorpicker" type="color" id="base_color" name="base_color"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group offset-md-3 col-md-6">
                    <label class="col-form-label wplc_colorpicker_label"
                           for="buttons_color"><?= __( "Buttons color", 'wp-live-chat-support' ) ?></label>
                    <input class="form-control wplc_style_colorpicker" type="color" id="buttons_color"
                           name="buttons_color">
                </div>
            </div>
            <div class="row">
                <div class="form-group offset-md-3 col-md-6">
                    <label class="col-form-label wplc_colorpicker_label"
                           for="agent_color"><?= __( "Agent bubble color", 'wp-live-chat-support' ) ?></label>
                    <input class="form-control wplc_style_colorpicker" type="color" id="agent_color"
                           name="agent_color"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group offset-md-3 col-md-6">
                    <label class="col-form-label wplc_colorpicker_label"
                           for="client_color"><?= __( "Client bubble color", 'wp-live-chat-support' ) ?></label>
                    <input class="form-control wplc_style_colorpicker" type="color" id="client_color"
                           name="client_color"/>
                </div>
            </div>
        </div>
        <div class="col-md-6 wplc_chat_preview">
            <div id="chat_preview_container" style="
                --call-us-form-header-background:#373737;
                --call-us-main-button-background:#0596d4;
                --call-us-client-text-color:#d4d4d4;
                --call-us-agent-text-color:#eeeeee;
                --call-us-form-height:330px;">
                <div class="panel">
                    <div class="panel_content chat-form">
                        <div class="panel_head">
                            <div class="root">
                                <div class="d-flex">
                                    <div class="d-flex">
                                        <div class="img_cont">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.9 46.9" class="">
                                                <path d="M23.4 46.9C10.5 46.9 0 36.4 0 23.4c0-6.2 2.5-12.1 6.8-16.5C11.2 2.5 17.2 0 23.4 0h.1c12.9 0 23.4 10.5 23.4 23.4 0 13-10.5 23.4-23.5 23.5zm0-45.3c-12.1 0-21.9 9.8-21.8 21.9 0 5.8 2.3 11.3 6.4 15.4 4.1 4.1 9.6 6.4 15.4 6.4 12.1 0 21.8-9.8 21.8-21.9 0-12.1-9.7-21.8-21.8-21.8z"
                                                      fill="#0596d4"></path>
                                                <circle cx="23.4" cy="23.4" r="18.6" fill="#eaeaea"></circle>
                                                <path d="M27 27.6c3.1-2 4-6.1 2-9.1s-6.1-4-9.1-2-4 6.1-2 9.1c.5.8 1.2 1.5 2 2-4.4.4-7.7 4-7.7 8.4v2.2c6.6 5.1 15.9 5.1 22.5 0V36c0-4.4-3.3-8-7.7-8.4z"
                                                      fill="#fff"></path>
                                            </svg>
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <div title="Agent" class="user_name">Agent</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="action_menu">
                            <span class="action_menu_btn button-closed_8MHR-">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="-5 -5 35 35" class="">
                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                    <path d="M0 0h24v24H0z"
                                          fill="none"></path>
                                </svg>
                            </span>
                            </div>
                        </div>
                        <div class="panel_body">
                            <div class="chatroot chatbody">
                                <div class="card-body card-body_chat msg_card_body">
                                    <div class="messageroot">
                                        <div class="d-flex justify-content-end msg_bubble">
                                            <div class="msg_container_send" style="color: black;">
                                                <span>Hello! How can we help you today?</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="messageroot">
                                        <div class="d-flex justify-content-start msg_bubble">
                                            <div class="img_cont_msg">
                                                <img src="<?= wplc_protocol_agnostic_url( WPLC_PLUGIN_URL . '/images/vi_avatar.png' ); ?>"
                                                     class="rounded-circle user_img_msg">
                                            </div>
                                            <div class="msg_container" style="color: black;">
                                                <span>Lorem ipsum</span>
                                                <div class="msg_sub">
                                                <span class="msg_time">
                                                    <div class="msg_sender_name">Visitor </div>
                                                </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="messageroot">
                                        <div class="d-flex justify-content-end msg_bubble">
                                            <div class="msg_container_send" style="color: black;">
                                                <span>dolor sit amet</span>
                                                <div class="msg_sub">
                                                <span class="msg_time_send">
                                                    <div class="msg_sender_name">Agent</div>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="img_cont_msg">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.9 46.9"
                                                     class="">
                                                    <path d="M23.4 46.9C10.5 46.9 0 36.4 0 23.4c0-6.2 2.5-12.1 6.8-16.5C11.2 2.5 17.2 0 23.4 0h.1c12.9 0 23.4 10.5 23.4 23.4 0 13-10.5 23.4-23.5 23.5zm0-45.3c-12.1 0-21.9 9.8-21.8 21.9 0 5.8 2.3 11.3 6.4 15.4 4.1 4.1 9.6 6.4 15.4 6.4 12.1 0 21.8-9.8 21.8-21.9 0-12.1-9.7-21.8-21.8-21.8z"
                                                          fill="#0596d4"></path>
                                                    <circle cx="23.4" cy="23.4" r="18.6" fill="#eaeaea"></circle>
                                                    <path d="M27 27.6c3.1-2 4-6.1 2-9.1s-6.1-4-9.1-2-4 6.1-2 9.1c.5.8 1.2 1.5 2 2-4.4.4-7.7 4-7.7 8.4v2.2c6.6 5.1 15.9 5.1 22.5 0V36c0-4.4-3.3-8-7.7-8.4z"
                                                          fill="#fff"></path>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="card-footer card-footer">
                                    <div class="chat-message-input-form">
                                        <div class="materialInput"><input readonly type="text"
                                                                          placeholder="Type your message..."
                                                                          maxlength="20479" name="chatInput"
                                                                          autocomplete="off"
                                                                          class="chat-message-input"></div>
                                        <div class="chat-action-buttons send-trigger send_disable">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                 data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 512 512"
                                                 class="svg-inline--fa fa-paper-plane fa-w-16 fa-2x"
                                                 style="width: 20px; height: 20px;">
                                                <path fill="currentColor"
                                                      d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="banner">
                                        <div class="chat-action-buttons">
                                        <span class="emoji-trigger">
                                            <svg viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                                                <path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z"></path>
                                            </svg>
                                        </span>
                                        </div>
                                        <span class="powered-by"><a href="https://www.3cx.com" target="_blank">Powered By 3CX </a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
