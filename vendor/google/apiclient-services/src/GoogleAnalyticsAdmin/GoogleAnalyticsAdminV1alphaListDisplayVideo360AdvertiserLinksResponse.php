<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\GoogleAnalyticsAdmin;

class GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinksResponse extends \Google\Collection
{
  protected $collection_key = 'displayVideo360AdvertiserLinks';
  protected $displayVideo360AdvertiserLinksType = GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink::class;
  protected $displayVideo360AdvertiserLinksDataType = 'array';
  public $nextPageToken;

  /**
   * @param GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink[]
   */
  public function setDisplayVideo360AdvertiserLinks($displayVideo360AdvertiserLinks)
  {
    $this->displayVideo360AdvertiserLinks = $displayVideo360AdvertiserLinks;
  }
  /**
   * @return GoogleAnalyticsAdminV1alphaDisplayVideo360AdvertiserLink[]
   */
  public function getDisplayVideo360AdvertiserLinks()
  {
    return $this->displayVideo360AdvertiserLinks;
  }
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinksResponse::class, 'Google_Service_GoogleAnalyticsAdmin_GoogleAnalyticsAdminV1alphaListDisplayVideo360AdvertiserLinksResponse');
