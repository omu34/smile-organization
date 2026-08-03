<?php

namespace Tests\Unit;

use App\Models\Activity;
use App\Models\Beneficiary;
use App\Models\NavigationLogoHeader;
use App\Models\Partner;
use App\Models\ResourceItem;
use App\Models\SocialLink;
use App\Models\WhyUsItem;
use PHPUnit\Framework\Attributes\Test;
use Spatie\MediaLibrary\HasMedia;

class SectionMediaCompatibilityTest extends \Tests\TestCase
{
    #[Test]
    public function public_section_models_use_spatie_media_library(): void
    {
        $models = [
            Activity::class,
            Beneficiary::class,
            NavigationLogoHeader::class,
            Partner::class,
            ResourceItem::class,
            SocialLink::class,
            WhyUsItem::class,
        ];

        foreach ($models as $modelClass) {
            $this->assertTrue(
                in_array(HasMedia::class, class_implements($modelClass), true),
                sprintf('%s should implement %s.', $modelClass, HasMedia::class)
            );
        }
    }
}
