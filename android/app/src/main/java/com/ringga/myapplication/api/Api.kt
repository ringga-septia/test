package com.ringga.myapplication.api



import com.ringga.myapplication.models.DefaulResponse
import com.ringga.myapplication.models.LoginResponse
import retrofit2.Call
import retrofit2.http.Field
import retrofit2.http.FormUrlEncoded
import retrofit2.http.POST

interface Api {

    //untuk absen nantik di ubah
@FormUrlEncoded
@POST("tambah")
fun tambah(
    @Field("email") email:String,
    @Field("name") name:String,
    @Field("pass") password:String,
    @Field("school") school:String
    ): Call<DefaulResponse>

    //login
    @FormUrlEncoded
    @POST("mhs")
    fun userLogin(
        @Field("email") email:String,
        @Field("pass") password: String
    ):Call<LoginResponse>


    //absen
    @FormUrlEncoded
    @POST("absenmhs")
    fun absen(
        @Field("nim") nim:Int,
        @Field("prodi") prodi:String,
        @Field("id_class") id_class:Int
    ):Call<DefaulResponse>
}