<x-mail::message>
# {{ __('site.mail.heading') }}

**{{ __('site.mail.name') }}:** {{ $consultation->name }}
**{{ __('site.mail.partner') }}:** {{ $consultation->partner_name ?: '—' }}
**{{ __('site.mail.email') }}:** {{ $consultation->email }}
**{{ __('site.mail.phone') }}:** {{ $consultation->phone ?: '—' }}
**{{ __('site.mail.nationality') }}:** {{ $consultation->nationality ?: '—' }}
**{{ __('site.mail.date') }}:** {{ $consultation->preferred_date?->toFormattedDateString() ?: '—' }}
**{{ __('site.mail.guests') }}:** {{ $consultation->guests ?? '—' }}
**{{ __('site.mail.looking') }}:** {{ $consultation->looking_for }}

{{ $consultation->message }}
</x-mail::message>
