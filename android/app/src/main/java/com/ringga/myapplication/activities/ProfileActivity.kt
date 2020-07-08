package com.ringga.myapplication.activities

import android.content.Intent
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import com.ringga.myapplication.R
import com.ringga.myapplication.activities.data.AbsenActivity
import com.ringga.myapplication.activities.data.KehadiranActivity
import com.ringga.myapplication.storage.SharedPrefManager
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_profile.*
import kotlinx.android.synthetic.main.activity_profile.foto


class ProfileActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_profile)

            //fungsi tombol pada form
        keluar.setOnClickListener {
            SharedPrefManager.getInstance(this)!!.clear()
            startActivity(Intent(baseContext, LoginActivity::class.java))
            finish()
        }
        btn_absen.setOnClickListener {
            startActivity(Intent(baseContext, AbsenActivity::class.java))
        }
        btn_kehadiran.setOnClickListener {
            startActivity(Intent(baseContext, KehadiranActivity::class.java))
        }



        tampilUser()
    }
private fun tampilUser(){
    val mypref = SharedPrefManager.getInstance(this)!!.user
    val nama = mypref.name
    val email= mypref.email
    val school = mypref.prodi
    var image = "http://192.168.8.102/api_ta/assets/gambar_profil/" + mypref.image
    tv_nama.setText(nama)
    tv_email.setText(email)
    tv_school.setText(school)

    Picasso.get().load(image).into(foto)
}






    //untuk mencek data ada atau tidak
    override fun onStart() {
        super.onStart()

        if(!SharedPrefManager.getInstance(this)!!.isLoggedIn){
            val intent = Intent(applicationContext, LoginActivity::class.java)
            intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK
            startActivity(intent)
        }
    }





















}
