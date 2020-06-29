package com.bpbd.www.bpbdjember;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {

    //creating Edit text
    EditText Username, Password;
    //creating button
    Button LoginButton;
    //creating volley Requestqueue
    RequestQueue requestQueue;

    //create string variabel to hold the EditText value
    String UsernameHolder, PasswordHolder;

    //creating progress dialog
    ProgressDialog progressDialog;

    //storing server url into string variabel
    String HttpsUrl = "http://192.168.1.5/android_register/user_login.php";

    Boolean CheckEditText;

    String TempServerResponseMatchedValue = "Data yang dimasukkan sama";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //Assigning ID's to EditText
        Username = (EditText) findViewById(R.id.username);
        Password = (EditText) findViewById(R.id.password);

        //Assigning ID's to Button
        LoginButton = (Button) findViewById(R.id.btn_login);

        //Creating volley new requestQueue
        requestQueue = Volley.newRequestQueue(LoginActivity.this);

        //Assigning Activity this to progress dialog
        progressDialog = new ProgressDialog(LoginActivity.this);

        //Adding click listener to Button
        LoginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                CheckEditTextIsEmptyOrNot();
                if (CheckEditText){
                    UserLogin();
                }else {
                    Toast.makeText(LoginActivity.this, "Harap diisi terlebih dahulu", Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    //Creating username login function
    public void UserLogin(){
        //Showing Progress dialog at user login time
        progressDialog.setMessage("Mohon Tunggu");
        progressDialog.show();

        //creating string request with post method
        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpsUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String ServerResponse) {

                        //hiding the progress dialog after all task complete
                        progressDialog.dismiss();

                        //matching server response message to our text
                        if (ServerResponse.equalsIgnoreCase("Data Sesuai")) {

                            //if response matched then show the toast
                            Toast.makeText(LoginActivity.this, "Login Sukses", Toast.LENGTH_LONG).show();

                            //finish the current login activity
                            finish();

                            //opening the user profile activity using intent
                            Intent intent = new Intent(LoginActivity.this, ProfilActivity.class);

                            //sending username to another activity using intent
                            intent.putExtra("UsernameTAG", UsernameHolder);

                            startActivity(intent);
                        } else {
                            //Showing echo response message coming from server
                            Toast.makeText(LoginActivity.this, "Trycatch" + ServerResponse, Toast.LENGTH_LONG).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        //hiding the progress dialog after all task complete
                        progressDialog.dismiss();

                        //showing error message if something goes wrong
                        Toast.makeText(LoginActivity.this, "Volley" + volleyError.toString(), Toast.LENGTH_LONG).show();
                    }
                }){
            @Override
            protected Map<String, String> getParams(){
                //creating Map String params
                Map<String, String> params = new HashMap<>();

                //Adding all values to Params
                params.put("USERNAME", UsernameHolder);
                params.put("PASSWORD", PasswordHolder);
                return params;
            }
        };

        //Creating RequestQueue
        RequestQueue requestQueue = Volley.newRequestQueue(LoginActivity.this);

        //Adding  the StringRequest object into requestQueue
        requestQueue.add(stringRequest);
    }
    public void CheckEditTextIsEmptyOrNot(){
        //Getting values from EditText
        UsernameHolder = Username.getText().toString().trim();
        PasswordHolder = Password.getText().toString().trim();

        //Checking whether EditText value is empty or not
        if (TextUtils.isEmpty(UsernameHolder) || TextUtils.isEmpty(UsernameHolder)){
            //if any of EditText is empty then set variable value as False
            CheckEditText = false;

        } else {
            //if any of EditText value is filled then set variable value as True
            CheckEditText = true;
        }

    }
}