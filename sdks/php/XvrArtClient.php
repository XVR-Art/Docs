<?php

/**
 * XvrArtClient
 * 
 * @author Super Junior <easelify@gmail.com>
 */

declare(strict_types=1);

class XvrArtClient
{
    public string $gw = 'https://api.xvr.art/api/v1/open/';
    public string $ak = '<pass your access key here>';
    public string $sk = '<pass your access secret here>';

    public function __construct($ak, $sk)
    {
        $this->ak = $ak;
        $this->sk = $sk;
    }

    public function call(string $api, array $params): array
    {
        try {
            $apiurl = $this->gw . ltrim($api, '/');

            $params['ak'] = $this->ak;
            $params['timestamp'] = time();

            $sign = $this->makeSign($params, $this->sk);
            $params['sign'] = $sign;

            return $this->curl($apiurl, $params);
        } catch (\Throwable $th) {
            return [
                'code' => 0,
                'msg' => $th->getMessage(),
            ];
        }
    }

    public function makeSign(array $params, string $secret): string
    {
        if (empty($secret)) {
            return '';
        }

        unset($params['sign']);

        ksort($params);
        $string = $secret;
        foreach ($params as $key => $val) {
            $string .= $key . $val;
        }
        unset($key, $val);

        $string .= $secret;

        return strtolower(md5($string));
    }

    private function curl(string $url, array $params): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        if (strtolower(substr($url, 0, 5)) == 'https') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch), __LINE__);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new \Exception($response, $httpStatusCode);
            }
        }
        curl_close($ch);

        return json_decode($response, true);
    }
}
