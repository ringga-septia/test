package com.ringga.myapplication.models

data class LoginResponse(
    val error : Boolean,
    val message: String,
    val data: User,
    val data2: UserDosen,
    val role: Int)