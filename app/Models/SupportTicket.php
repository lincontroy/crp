<?php

namespace App\Models;

use App\Constants\SupportTicketConst;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportTicket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = [
        'user',
        'attachments'
    ];

    protected $appends = ['stringStatus'];

    public function authSolution() {
        $data = [
            'class'     => "",
            'foreign'   => "",
        ];

        if(get_auth_guard() == 'web') {
            $data = [
                'class'     => User::class,
                'foreign'   => "user_id",
            ];
        }
        return (object) $data;
    }

    public function scopeAuthTickets($query) {
        $foreign_key = $this->authSolution()->foreign;
        return $query->where($foreign_key,auth()->user()->id);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function agent() {
        return $this->belongsTo(Agent::class);
    }

    public function getCreatorAttribute() {
        if($this->type == SupportTicketConst::TYPE_USER) {
            return $this->user;
        }
        return null;
    }

    public function attachments() {
        return $this->hasMany(SupportTicketAttachment::class);
    }

    public function conversations() {
        return $this->hasMany(SupportChat::class,"support_ticket_id");
    }

    public function scopePending($query) {
        return $query->where("status",SupportTicketConst::PENDING)->orWhere("status",SupportTicketConst::DEFAULT);
    }

    public function scopeActive($query) {
        return $query->where("status",SupportTicketConst::ACTIVE);
    }

    public function scopeSolved($query) {
        return $query->where("status",SupportTicketConst::SOLVED);
    }

    public function scopeNotSolved($query,$token) {
        $query->where('token',$token)->where('status','!=',SupportTicketConst::SOLVED);
    }

    public function getStringStatusAttribute() {
        $status = $this->status;
        $data = [
            'class' => "",
            'value' => "",
        ];
        if($status == SupportTicketConst::ACTIVE) {
            $data = [
                'class'     => "badge badge--info",
                'value'     => __("Active"),
            ];
        }else if($status == SupportTicketConst::DEFAULT) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => __("Pending"),
            ];
        }else if($status == SupportTicketConst::PENDING) {
            $data = [
                'class'     => "badge badge--warning",
                'value'     => __("Pending"),
            ];
        }else if($status == SupportTicketConst::SOLVED) {
            $data = [
                'class'     => "badge badge--success",
                'value'     => __("Solved"),
            ];
        }

        return (object) $data;
    }
}
