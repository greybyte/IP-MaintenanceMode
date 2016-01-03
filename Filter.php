<?php


namespace Plugin\MaintenanceMode;


class Filter
{
    /**
     * @param \Ip\Response $response
     * @return mixed
     */
    public static function ipSendResponse($response)
    {
	    if (ipGetOption('MaintenanceMode.enabled')==1 && ipAdminId()===false) {
		    if (substr(ipRequest()->getRelativePath(), 0, 5)!='admin')
				return new \Ip\Response(ipGetOption('MaintenanceMode.content'));
	    }
	    return $response;
    }
}
