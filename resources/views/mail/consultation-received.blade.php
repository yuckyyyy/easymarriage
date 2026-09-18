<x-mail::message>
# New consultation request

**Name:** {{ $consultation->name }}
**Partner:** {{ $consultation->partner_name ?: '—' }}
**Email:** {{ $consultation->email }}
**Phone / WhatsApp:** {{ $consultation->phone ?: '—' }}
**Nationality:** {{ $consultation->nationality ?: '—' }}
**Preferred date:** {{ $consultation->preferred_date?->toFormattedDateString() ?: '—' }}
**Guests:** {{ $consultation->guests ?? '—' }}
**Looking for:** {{ $consultation->looking_for }}

{{ $consultation->message }}
</x-mail::message>
