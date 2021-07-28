<?php

declare (strict_types=1);
namespace Symplify\MonorepoBuilder\Merge\ComposerKeyMerger;

use MonorepoBuilder20210728\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
use Symplify\MonorepoBuilder\Merge\Contract\ComposerKeyMergerInterface;
final class PreferStableKeyMerger implements \Symplify\MonorepoBuilder\Merge\Contract\ComposerKeyMergerInterface
{
    /**
     * @param \Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $mainComposerJson
     * @param \Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $newComposerJson
     */
    public function merge($mainComposerJson, $newComposerJson) : void
    {
        if ($newComposerJson->getPreferStable() === null) {
            return;
        }
        $mainComposerJson->setPreferStable($newComposerJson->getPreferStable());
    }
}
