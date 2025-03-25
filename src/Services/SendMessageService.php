<?php

namespace Nekkoy\GatewayLetsads\Services;

use Nekkoy\GatewayAbstract\DTO\ResponseDTO;
use Nekkoy\GatewayAbstract\Services\AbstractSendMessageService;
use Nekkoy\GatewayLetsads\DTO\ConfigDTO;

/**
 *
 */
class SendMessageService extends AbstractSendMessageService
{
    /** @var string  */
    protected $api_url = "https://api.letsads.com";

    /** @var ConfigDTO */
    protected $config;

    /** @return mixed */
    protected function data()
    {
        if( $this->config->channel == "sms" ) {
            $request = '<?xml version="1.0" encoding="UTF-8"?>
                        <request>
                            <auth>
                                <login>%s</login>
                                <password>$s</password>
                            </auth>
                            <message>
                                <from>%s</from>
                                <text>%s</text>
                                <recipient>%s</recipient>
                            </message>
                        </request>';
            return sprintf($request, $this->config->login, $this->config->password, $this->config->name_sms, $this->message->text, $this->message->destination);
        } else {
            $request = '<?xml version="1.0" encoding="UTF-8"?>
                        <request>
                            <auth>
                                <login>%s</login>
                                <password>%s</password>
                            </auth>
                            <viber_text>
                                <from>%s</from>
                                <text>%s</text>
                                <life_time>1440</life_time>
                                <recipient>%s</recipient>
                            </viber_text>
                        </request>';
            return sprintf($request, $this->config->login, $this->config->password, $this->config->name_viber, $this->message->text, $this->message->destination);
        }
    }

    /** @return mixed */
    protected function development()
    {
        if( $this->config->channel == "sms" ) {
            return '<?xml version="1.0" encoding="UTF-8"?>
                    <response>
                        <name>Complete</name>
                        <description>4 messages put into queue</description>
                        <sms_id>633217</sms_id>
                    </response>';
        } else {
            return '<?xml version="1.0" encoding="UTF-8"?>
                    <response>
                        <name>ViberComplete</name>
                        <description>2 messages put into queue</description>
                        <viber_id>623454</viber_id>
                    </response>';
        }
    }

    /**
     * @return void
     */
    protected function response()
    {
        $response = simplexml_load_string($this->response);
        if( isset($response->name) && ( $response->name == 'Complete' || $response->name == 'ViberComplete' ) ) {
            $this->response_code = 0;
            $this->response_message = $response->name;
        } elseif( isset($response->name) && $response->name == 'Error' ) {
            $this->response_code = -1;
            $this->response_message = json_encode($response->description, JSON_UNESCAPED_UNICODE);
        }

        if( isset($response->viber_id) ) {
            $this->message_id = reset($response->viber_id);
        }

        if( isset($response->sms_id) ) {
            $this->message_id = reset($response->sms_id);
        }
    }
}
