jQuery(document).ready(function () {

    wplc_setup_progressbar();

    if (jQuery("form#wplc_wizard").length > 0) {
        wplc_setup_channel_selection();
         wplc_setup_auth_selection();
        setup_agents_carousel();
        setup_styling_manage();
        setup_form_submission();
        setup_pbx_settings();
    } else {
        setup_completion();
    }


    var current_step, next_step, previous_step, is_next_final, is_previous_first;
    var opacity;

    jQuery("#wplc_wizard").on("keydown", function(event) {
        if (event.keyCode === 13) {
            let buttonNext = jQuery("fieldset[data-step-id="+jQuery("#wplc_wizard_progressbar li.active").prop("id")+"] .next:enabled");
            if(buttonNext) {
                buttonNext.click();
            }
            event.stopPropagation();
            event.preventDefault();
        }
    })

    jQuery(".next").click(function (e) {
        e.preventDefault();
        current_step = jQuery(jQuery(this).parents('fieldset')[0]);
        if (current_step.data("jsvalidation") !== undefined && current_step.data("jsvalidation").length > 0) {
            let validationresult = eval(current_step.data("jsvalidation") + "();");
            if (validationresult.error) {
                setupElementValidation(validationresult.object, validationresult.message);
                if (!validationresult.object.validity.valid) {
                    jQuery(validationresult.object).off('input', function(event) {
                        setupElementValidation(validationresult.object, validationresult.message);
                    });
                    jQuery(validationresult.object).on('input', function(event) {
                        setupElementValidation(validationresult.object, validationresult.message);
                    });
                }
                return;
            }
        }
        next_step = jQuery(jQuery(jQuery(this).parents('fieldset')[0]).nextAll("[data-include=true]")[0]);
        is_next_final = next_step.nextAll("[data-include=true]").length <= 1;
        //Add Class Active
        jQuery("#wplc_wizard_progressbar li[data-include=true]").removeClass("active");

        var nextStepLi = jQuery("#wplc_wizard_progressbar li[data-include=true]").eq(jQuery("fieldset[data-include=true]").index(next_step));
        nextStepLi.addClass("active");

        if (is_next_final) {
            jQuery(next_step).find("button.next").html("Finish");
            jQuery(next_step).find("button.next").attr("id", "button_finish");
        }
        jQuery(".wplc-wizard-buttons").css('justify-content', 'space-between');


        //show the next fieldset
        next_step.show();

        const disableNext = (
            (jQuery(next_step).data("step-id") == 'step-pbx' && jQuery("#clickToTalkUrl").val().length <= 0) ||
            (jQuery(next_step).data("step-id") == 'step-auth' && (jQuery('input[name="wplc_auth_mode"]:checked').val() === undefined || jQuery('input[name="wplc_c2c_mode"]:checked').val() === undefined))
        );

        jQuery(".next").prop('disabled', disableNext);


        //hide the current fieldset with style
        current_step.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_step.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_step.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    jQuery(".previous").click(function (e) {
        e.preventDefault();
        current_step = jQuery(jQuery(this).parents('fieldset')[0]);
        previous_step = jQuery(jQuery(jQuery(this).parents('fieldset')[0]).prevAll("[data-include=true]")[0]); // jQuery(this).parent().prev();
        is_previous_first = previous_step.prevAll("[data-include=true]").length < 1;
        //Remove class active
        jQuery("#wplc_wizard_progressbar li[data-include=true]").removeClass("active");
        jQuery("#wplc_wizard_progressbar li[data-include=true]").eq(jQuery("fieldset[data-include=true]").index(previous_step)).addClass("active");

        //show the previous fieldset
        previous_step.show();
        const disableNext = (
            (jQuery(previous_step).data("step-id") == 'step-pbx' && jQuery("#clickToTalkUrl").val().length <= 0 ) ||
            (jQuery(previous_step).data("step-id") == 'step-auth' && (jQuery('input[name="wplc_auth_mode"]:checked').val() === undefined || jQuery('input[name="wplc_c2c_mode"]:checked').val() === undefined))
        );

        jQuery(".next").prop('disabled', disableNext);


        if (is_previous_first) {
            jQuery(".wplc-wizard-buttons").css('justify-content', 'flex-end');
        }
        //


        //hide the current fieldset with style
        current_step.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_step.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_step.css({'opacity': opacity});
            },
            duration: 600
        });
    });

});

function wplc_setup_progressbar() {
    jQuery("#wplc_wizard_progressbar li").hide();
    var li_width = 100 / jQuery("#wplc_wizard_progressbar li[data-include=true]").length;
    jQuery("#wplc_wizard_progressbar li[data-include=true]").width(li_width + '%');
    jQuery("#wplc_wizard_progressbar li[data-include=true]").css('display', 'flex').show();


    jQuery(".wizard-step-text").each(function (index, progressTextElement) {
        var text_lines = jQuery(progressTextElement).height() / 18;
        if (text_lines === 1) {
            jQuery(progressTextElement).css('top', '38%');
        } else {
            jQuery(progressTextElement).css('top', '30%');
        }

    });
}

function wplc_setup_channel_selection() {
    jQuery(".next").prop('disabled', true);
    jQuery('.wplc-channel-selection>input[type=radio][name=wplc_pbx_exist]').on("change", function () {
        jQuery(".next").prop('disabled', false);
        var selection = jQuery(this).val();
        setSessionStorageValue("channel", selection);

        jQuery("#wplc_wizard fieldset").each(function (index, step) {
            var stepChannels = jQuery(step).data("channels").split(',');
            var removeStep = true;
            stepChannels.forEach(channel => {
                if (channel == "*" || channel == selection) {
                    removeStep = false;
                }
            });

            if (removeStep) {
                jQuery("li[id='" + jQuery(step).data("step-id") + "']").attr("data-include", false);

                jQuery(this).attr("data-include", false)
                jQuery(this).find("input,select").each(function (index, input) {
                    jQuery(input).attr("disabled", true);
                })

            } else {
                jQuery("li[id='" + jQuery(step).data("step-id") + "']").attr("data-include", true);

                jQuery(this).attr("data-include", true)
                jQuery(this).find("input,select").each(function (index, input) {
                    jQuery(input).attr("disabled", false);
                })
            }
        });
        wplc_setup_progressbar();
    });
}

function setup_agents_carousel() {
    jQuery(".add-agent").on("click", function () {
        var itemsCount = jQuery(".new-agent-item").length;
        var newNode = jQuery(".new-agent-item-template").clone();
        newNode.insertBefore(jQuery(this).closest(".new-agent-item"));
        newNode.removeClass("new-agent-item-template");
        newNode.addClass("new-agent-item");

        newNode.find('[data-array-id]').each((key, element) => {
            var arrayName = jQuery(element).data("array-id");
            var maintainName = jQuery(element).data("maintain-name");
            var fieldName = maintainName ? jQuery(element).attr("name") : arrayName;
            jQuery(element).attr("id", "agentEntry_" + itemsCount + "_" + arrayName);
            jQuery(element).attr("name", "agentEntry[" + itemsCount + "][" + fieldName + "]");
            jQuery(element).prop("disabled", false);
        })
        newNode.show();
    });

    var agentsTab = jQuery("#myCarousel").closest("fieldset");
    var agentsTabID = jQuery(agentsTab).data("step-id");
    jQuery(agentsTab).find("#button_next_" + agentsTabID).on("click", function () {
        var values = {};
        jQuery.each(jQuery(agentsTab).serializeArray(), function (i, field) {
            values[field.name] = field.value;
        });
        setSessionStorageValue("agents", values);
    });
}

function wplc_setup_auth_selection() {
    jQuery('input[name="wplc_auth_mode"],input[name="wplc_c2c_mode"]').on('change', function(event) {
        var disableNext = jQuery('input[name="wplc_auth_mode"]:checked').val() === undefined || jQuery('input[name="wplc_c2c_mode"]:checked').val() === undefined;
        jQuery(".next").prop('disabled', disableNext);
    });
}

function setup_styling_manage() {

    var wplc = jQuery("#chat_preview_container")[0];

    jQuery("#base_color").val(wplc.style.getPropertyValue("--call-us-form-header-background"));
    jQuery("#buttons_color").val(wplc.style.getPropertyValue("--call-us-main-button-background"));
    jQuery("#agent_color").val(wplc.style.getPropertyValue("--call-us-agent-text-color"));
    jQuery("#client_color").val(wplc.style.getPropertyValue("--call-us-client-text-color"));


    jQuery("#base_color").on("change", function () {
        wplc.style.setProperty("--call-us-form-header-background", jQuery(this).val());
    });

    jQuery("#buttons_color").on("change", function () {
        wplc.style.setProperty("--call-us-main-button-background", jQuery(this).val());
    });
    jQuery("#agent_color").on("change", function () {
        wplc.style.setProperty("--call-us-agent-text-color", jQuery(this).val());
    });
    jQuery("#client_color").on("change", function () {
        wplc.style.setProperty("--call-us-client-text-color", jQuery(this).val());
    });

}

function setup_form_submission() {
    jQuery("body").on("click", "#button_finish", function () {
        jQuery("#wplc_wizard").submit();
    });
}

function setSessionStorageValue(key, value) {
    var activation_data = sessionStorage.getItem("wplc_activation");
    if (typeof activation_data == "undefined" || activation_data == null) {
        activation_data = {};
    } else {
        activation_data = JSON.parse(activation_data);
    }

    activation_data[key] = value;
    sessionStorage.setItem("wplc_activation", JSON.stringify(activation_data));
}

function getSessionStorageValue(key) {
    var activation_data = sessionStorage.getItem("wplc_activation");
    let result = null;
    if (typeof activation_data != "undefined" && activation_data != null) {
        activation_data = JSON.parse(activation_data);
        if (activation_data.hasOwnProperty(key)) {
            result = activation_data[key];
        }
    }
    return result;
}

function setup_completion() {
    jQuery("#button_start_now").on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        window.location.assign(localization_data.chat_list_url);
    });
}

function setup_pbx_settings() {

      jQuery("#clickToTalkUrl").on("input", function(event) {
        jQuery(".next").prop('disabled', jQuery(this).val().length <= 0);
    });


    jQuery("input[name=wplc_pbx_exist]").on("change", function (event) {
        if (jQuery(this).val() === 'new') {
            jQuery("#existing_pbx_settings").fadeOut();
            jQuery("#new_pbx_instructions").fadeIn();
        } else if (jQuery(this).val() === 'exist') {
            jQuery("#new_pbx_instructions").fadeOut();
            jQuery("#existing_pbx_settings").fadeIn();
        }
        /*
        */
    });
}

function validatePbx() {

    let result = {
        error: false,
        message: ""
    }
    var element = jQuery("#clickToTalkUrl")[0];
    var validityState_object = element.validity;
    if (validityState_object.patternMismatch) {
        result.error = true;
        result.message = "Please fill the field 3CX Click2Talk URL with a valid url."
        result.object = element;
    }
    return result;
}
function analyzeClickToTalkUrl(urlStr) {
    let result = {
        error: false
    };
    try {
        const url = new URL(urlStr);
        result.channelUrl = url.protocol + "//" + url.host;
        result.party = url.hash.replace('#', '');
    } catch (error) {
        error;
        result.error = true;
    }

    return result;

}

function setupElementValidation(element, message) {
    element.setCustomValidity('')
    var validityState_object = element.validity;

    if (!validityState_object.valid) {
        element.setCustomValidity(message);
    }
    element.reportValidity();
}