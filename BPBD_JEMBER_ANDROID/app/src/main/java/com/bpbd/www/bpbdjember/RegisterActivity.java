package com.bpbd.www.bpbdjember;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bpbd.www.bpbdjember.helper.SessionManager;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;
import java.util.Objects;

public class RegisterActivity extends AppCompatActivity {

    TextView tvLogin;
    EditText nama, username, alamat, nomer, email, password, c_password;
    String BaseUrl, fnama, fuser, falamat, fnomer, femail, fpass, fcpass;
    Button btn_regist;
    ProgressBar loading;
    RequestQueue requestQueue;
    Boolean CheckisEmpty;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        BaseUrl     = SessionManager.BASE_URL;
        tvLogin     = findViewById(R.id.tvLogin);
        loading     = findViewById(R.id.loading);
        nama        = findViewById(R.id.nama);
        username    = findViewById(R.id.username);
        alamat      = findViewById(R.id.alamat);
        nomer       = findViewById(R.id.nomer);
        email       = findViewById(R.id.email);
        password    = findViewById(R.id.password);
        c_password  = findViewById(R.id.c_password);
        btn_regist  = findViewById(R.id.btn_regist);
        progressDialog  = new ProgressDialog(this);
        requestQueue    = Volley.newRequestQueue(this);

//        tvLogin.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View view) {
//                Intent intent = new Intent(RegisterActivity.this, LoginActivity.class);
//                intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
//                intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK);
//                startActivity(intent);
//            }
//        });
        
        btn_regist.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Regis();
            }
        });

    }

    private void Regis(){
        loading.setVisibility(View.VISIBLE);
        btn_regist.setVisibility(View.GONE);

        final String nama = this.nama.getText().toString().trim();
        final String username = this.username.getText().toString().trim();
        final String alamat = this.alamat.getText().toString().trim();
        final String nomer = this.nomer.getText().toString().trim();
        final String email = this.email.getText().toString().trim();
        final String password = this.password.getText().toString().trim();
        final String c_password = this.c_password.getText().toString().trim();

        String HttpUrl = BaseUrl + "api/login/register";
        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            if (success.equals("1")){
                                Toast.makeText(RegisterActivity.this, "Register Success!", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(RegisterActivity.this, "Register Error! " + e.toString(), Toast.LENGTH_SHORT).show();
                            loading.setVisibility(View.GONE);
                            btn_regist.setVisibility(View.VISIBLE);
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(RegisterActivity.this, "Register Error! " + error.toString(), Toast.LENGTH_SHORT).show();
                        loading.setVisibility(View.GONE);
                        btn_regist.setVisibility(View.VISIBLE);
                    }
                })

        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("nama", nama);
                params.put("username", username);
                params.put("alamat", alamat);
                params.put("nomer", nomer);
                params.put("email", email);
                params.put("password", password);
                params.put("Content-Type","application/x-www-form-urlencoded");
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }
}
