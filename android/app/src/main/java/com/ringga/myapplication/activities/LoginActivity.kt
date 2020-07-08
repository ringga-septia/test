package com.ringga.myapplication.activities

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Toast
import com.ringga.myapplication.R
import com.ringga.myapplication.api.RetrofitClient
import com.ringga.myapplication.models.LoginResponse
import com.ringga.myapplication.storage.SharedPrefManager
import kotlinx.android.synthetic.main.activity_login.*
import kotlinx.android.synthetic.main.activity_login.editTextEmail
import kotlinx.android.synthetic.main.activity_login.editTextPassword
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


class LoginActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        textViewRegister.setOnClickListener {
            startActivity(Intent(this@LoginActivity, MainActivity::class.java))
        }
        buttonLogin.setOnClickListener {

            val email = editTextEmail.text.toString().trim()
            val password = editTextPassword.text.toString().trim()

            if(email.isEmpty()){
                editTextEmail.error = "Email required"
                editTextEmail.requestFocus()
                return@setOnClickListener
            }


            if(password.isEmpty()){
                editTextPassword.error = "Password required"
                editTextPassword.requestFocus()
                return@setOnClickListener
            }

            RetrofitClient.instance.userLogin(email, password)
                .enqueue(object : Callback<LoginResponse>{
                    override fun onFailure(call: Call<LoginResponse>, t: Throwable) {
                        Toast.makeText(applicationContext, t.message, Toast.LENGTH_LONG).show()
                    }

                    override fun onResponse(
                        call: Call<LoginResponse>,
                        response: Response<LoginResponse>
                    ) {

                            if (response.body()?.error!!){
                                response.body()?.data?.let { it1 ->
                                    SharedPrefManager.getInstance(applicationContext)!!.saveUser(response.body()?.data!!)

                                    val intent = Intent(applicationContext, ProfileActivity::class.java)
                                    intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK

                                    startActivity(intent)
                                }
                            }else{
                              Toast.makeText(applicationContext, response.body()?.message,Toast.LENGTH_LONG).show()
                              //  Toast.makeText(this@LoginActivity, pesan ,Toast.LENGTH_LONG).show()
                            }

              //         }else{
//                            Toast.makeText(this@LoginActivity,"dosen yang login",Toast.LENGTH_LONG).show()
////                        if (!response.body()?.error!!){
////                            response.body()?.data?.let { it1 ->
////                                SharedPrefManager.getInstance(applicationContext)!!.saveUser(response.body()?.data!!)
////
////                                val intent = Intent(applicationContext, ProfileActivity::class.java)
////                                intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK
////
////                                startActivity(intent)
////                            }
////                        }else{
////                            Toast.makeText(applicationContext, response.body()?.message,Toast.LENGTH_LONG).show()
////                        }
//
//                        }


                    }

                })


        }
    }

    override fun onStart() {
        super.onStart()

        if(SharedPrefManager.getInstance(this)!!.isLoggedIn){
            val intent = Intent(applicationContext, ProfileActivity::class.java)
            intent.flags = Intent.FLAG_ACTIVITY_NEW_TASK or Intent.FLAG_ACTIVITY_CLEAR_TASK

            startActivity(intent)
        }
    }
}
