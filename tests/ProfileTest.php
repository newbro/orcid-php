<?php
/**
 * @package   orcid-php
 * @author    Sam Wilson <samwilson@purdue.edu>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 */

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Profile.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Oauth.php';

use Orcid\Profile;
use Orcid\Oauth;

/**
 * Base ORCID profile tests
 */
class ProfileTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Test to make sure we can get an orcid id
	 *
	 * @return  void
	 **/
	public function testGetOrcidId()
	{
		// Mock the Oauth class to return an ORCID iD
		$oauth = $this->getMockBuilder('Oauth')
		              ->setMethods(['getOrcid'])
		              ->getMock();

		// Tell the oauth method to return an empty ORCID iD
		$oauth->method('getOrcid')
		      ->willReturn('0000-0000-0000-0000');

		$profile = new Profile($oauth);

		$this->assertEquals('0000-0000-0000-0000', $profile->id(), 'Failed to fetch properly formatted ID');
	}
}