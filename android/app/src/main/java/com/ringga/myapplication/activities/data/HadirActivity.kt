package com.ringga.myapplication.activities.data

import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.ringga.myapplication.R
import com.ringga.myapplication.api.RetrofitClient
import com.ringga.myapplication.models.DefaulResponse
import com.ringga.myapplication.storage.SharedPrefManager
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class HadirActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_hadir)



        val mypref = SharedPrefManager.getInstance(this)!!.user
        val nim = mypref.nim
        val prodi = mypref.prodi
        val extras = intent.extras
      val  id_class = extras!!.getInt("inputBc")



            RetrofitClient.instance.absen(nim, prodi, id_class)
                .enqueue(object : Callback<DefaulResponse> {
                    override fun onFailure(call: Call<DefaulResponse>, t: Throwable) {
                        Toast.makeText(applicationContext, t.message, Toast.LENGTH_LONG).show()
                    }

                    override fun onResponse(
                        call: Call<DefaulResponse>,
                        response: Response<DefaulResponse>
                    ) {
                        Toast.makeText(applicationContext, response.body()?.message, Toast.LENGTH_LONG).show()
                    }

                })


    }

}
