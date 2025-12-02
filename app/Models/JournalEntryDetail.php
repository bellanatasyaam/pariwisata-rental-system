<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntryDetail extends Model
{
    protected $fillable = [
        'journal_entry_id',
        'chart_of_account_id',
        'debit',
        'credit',
    ];

    public function journalEntry()
    {
        return $this->belongsTo(JournalEntry::class);
    }

    public function account()
    {
        return $this->belongsTo(ChartOfAccounts::class, 'chart_of_account_id');
    }
}
