<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function up()
{
    Schema::create('requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('offer_id')->constrained();
        $table->string('status')->default('pending');
        // Add more fields as needed
        $table->timestamps();
    });
}
}
