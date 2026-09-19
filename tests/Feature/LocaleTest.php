<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocaleTest extends TestCase
{
    public function test_home_defaults_to_ukrainian(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Одружитися', false)
            ->assertSee('lang="uk"', false)
            ->assertDontSee('Married in Georgia. In a day.', false);
    }

    public function test_english_locale_home(): void
    {
        $this->get('/en')
            ->assertOk()
            ->assertSee('Married', false)
            ->assertSee('lang="en"', false)
            ->assertSee('Get Started', false);
    }

    public function test_russian_locale_home(): void
    {
        $this->get('/ru')
            ->assertOk()
            ->assertSee('Пожениться', false)
            ->assertSee('lang="ru"', false);
    }

    public function test_ukrainian_prefix_redirects_to_default(): void
    {
        $this->get('/uk')->assertRedirect('/');
        $this->get('/uk/privacy')->assertRedirect('/privacy');
    }

    public function test_legal_pages_follow_locale(): void
    {
        $this->get('/privacy')
            ->assertOk()
            ->assertSee('Політика конфіденційності', false);

        $this->get('/en/privacy')
            ->assertOk()
            ->assertSee('Privacy Policy', false);

        $this->get('/ru/terms')
            ->assertOk()
            ->assertSee('Условия', false);
    }

    public function test_language_switcher_is_present(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('hreflang="uk"', false)
            ->assertSee('hreflang="en"', false)
            ->assertSee('hreflang="ru"', false);
    }
}
