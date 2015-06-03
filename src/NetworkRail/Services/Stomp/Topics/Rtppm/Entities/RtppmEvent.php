<?php

namespace OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages\NationalPage;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages\OocPage;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages\BasePage;
use OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities\Pages\OperatorPage;
use OpenRailData\NetworkRail\Services\Stomp\Events\AbstractEvent;


/**
 * Class Rtppm
 *
 * This is a an Real Time Public Performance Measurement event from Network
 * Rail.  The wiki describes the event as the following:
 *
 * "PPM, the Public Performance Measure, is the percentage of trains that
 * arrive 'on time' at their destination, regardless of who has impacted on
 * the train service."
 *
 * According to the documentation there are several caveats and gotchas to look
 * out for, as the measurement works things out quite differently from the official
 * PPM figures. Reading the short overview on the Wiki is strongly recommended.
 *
 * @see http://nrodwiki.rockshore.net/index.php/RTPPM
 *
 * @package OpenRailData\NetworkRail\Services\Stomp\Topics\Rtppm\Entities
 * @author Neil McGibbon <code@neilmcgibbon.com>
 */
class RtppmEvent extends AbstractEvent
{

    /**
     * @var RagThreshold[]
     */
    private $ragThresholds = [];

    /**
     * @var string
     */
    private $webPpmLink;

    /**
     * @var Ppt
     */
    private $ppt;

    /**
     * @var NationalPage
     */
    private $nationalPage;

    /**
     * @var OocPage
     */
    private $oocPage;

    /**
     * @var BasePage
     */
    private $commonOperatorPage;

    /**
     * @var OperatorPage
     */
    private $operatorPage;

    final function  __construct($data)
    {
        // Set RAG threshold objects.
        foreach ($data->RTPPMData->RAGThresholds as $threshold) {
            $this->ragThresholds[] = new RagThreshold($threshold);
        }

        // Set Web PPM guide link (.docx file)
        $this->setWebPpmLink($data->RTPPMData->WebPPMLink);

        // Set PPT object.
        $this->setPpt(new Ppt($data->RTPPMData->PPT));

        // Set "National Page"
        $this->setNationalPage(new NationalPage($data->RTPPMData->NationalPage));

        // Set "OOC Page"
        $this->setOocPage(new OocPage($data->RTPPMData->OOCPage));

        // Set "Common Operator" - this just uses the base page class as there is nothing extra.
        $this->setCommonOperatorPage(new BasePage($data->RTPPMData->CommonOperatorPage));

        // Set "Operator" Page.
        $this->setOperatorPage(new OperatorPage($data->RTPPMData->OperatorPage));

    }

    public function getEventKey()
    {
        return TopicEventNames::RTPPM;
    }

    /**
     * @return RagThreshold[]
     */
    public function getRagThresholds()
    {
        return $this->ragThresholds;
    }

    /**
     * @param RagThreshold[] $ragThresholds
     *
     * @return $this
     */
    public function setRagThresholds($ragThresholds)
    {
        $this->ragThresholds = $ragThresholds;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebPpmLink()
    {
        return $this->webPpmLink;
    }

    /**
     * @param string $webPpmLink
     *
     * @return $this
     */
    public function setWebPpmLink($webPpmLink)
    {
        $this->webPpmLink = $webPpmLink;
        return $this;
    }

    /**
     * @return Ppt
     */
    public function getPpt()
    {
        return $this->ppt;
    }

    /**
     * @param Ppt $ppt
     *
     * @return $this
     */
    public function setPpt($ppt)
    {
        $this->ppt = $ppt;
        return $this;
    }

    /**
     * @return Pages\NationalPage
     */
    public function getNationalPage()
    {
        return $this->nationalPage;
    }

    /**
     * @param Pages\NationalPage $nationalPage
     *
     * @return $this
     */
    public function setNationalPage(NationalPage $nationalPage)
    {
        $this->nationalPage = $nationalPage;
        return $this;
    }

    /**
     * @return Pages\OocPage
     */
    public function getOocPage()
    {
        return $this->nationalPage;
    }

    /**
     * @param Pages\OocPage $oocPage
     *
     * @return $this
     */
    public function setOocPage(OocPage $oocPage)
    {
        $this->oocPage = $oocPage;
        return $this;
    }

    /**
     * @return Pages\BasePage
     */
    public function getCommonOperatorPage()
    {
        return $this->commonOperatorPage;
    }

    /**
     * @param Pages\BasePage $commonOperatorPage
     *
     * @return $this
     */
    public function setCommonOperatorPage(BasePage $commonOperatorPage)
    {
        $this->commonOperatorPage = $commonOperatorPage;
        return $this;
    }

    /**
     * @return OperatorPage
     */
    public function getOperatorPage()
    {
        return $this->operatorPage;
    }

    /**
     * @param OperatorPage $operatorPage
     *
     * @return $this
     */
    public function setOperatorPage(OperatorPage $operatorPage)
    {
        $this->operatorPage = $operatorPage;
        return $this;
    }
}