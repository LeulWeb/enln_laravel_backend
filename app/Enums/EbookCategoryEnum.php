<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EbookCategoryEnum extends Enum
{
    const PUBLICATION=  'publication';
    const TRAINING = 'training';
    const LEADERSHIP = 'leadership';
}
