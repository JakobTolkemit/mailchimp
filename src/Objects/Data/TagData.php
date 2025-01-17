<?php
/**
 * @author Peter Ukena <peter.ukena@brille24.de>
 */

declare(strict_types=1);

namespace Brille24\Mailchimp\Objects\Data;

use ErrorException;

class TagData implements DataInterface
{
    /** @var array */
    protected $tags;

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    /** {@inheritDoc} */
    public function toRequestBody(): string
    {
        $bodyParameters = [];

        $bodyParameters['tags'] = $this->getTags();

        $body = json_encode($bodyParameters);
        if ($body === false) {
            throw new ErrorException('Member data could not be encoded to json');
        }

        return $body;
    }
}