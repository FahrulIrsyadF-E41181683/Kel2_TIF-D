package com.example.baru;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import java.net.URL;
import java.util.HashMap;

public class MainActivity extends AppCompatActivity {
    private TextView username, password, nama, email, alamat, no_hp;
    SessionManager sessionManager;
    String getId;
    private Menu action;
//    private static String URL_READ = "http://192.168.1.104/baru/profile_detail.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        sessionManager = new SessionManager(this);

        username.findViewById(R.id.username);
        password.findViewById(R.id.pass);
        nama.findViewById(R.id.nama);
        email.findViewById(R.id.email);
        alamat.findViewById(R.id.alamat);
        no_hp.findViewById(R.id.no_hp);

        HashMap<String, String> user= sessionManager.getUserDetail();
        getId = user.get(SessionManager.ID);
    }
    private void getUserDetail(final String id){
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

//        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_READ,
//                new Response.Listener<String>() {
//                    @Override
//                    public void onResponse(String response) {
//
//                    }
//                },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//
//                    }
//                })
//        {
//            @Override
//            protected Map<String, String> getParams() throws AuthFailureError {
//                return super.getParams();
//
//            }
//        }
    }
    @Override
    protected void onResume(){
        super.onResume();
        getUserDetail();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.menu_action, menu);

        action = menu;
        action.getItem(R.id.menu_save).setVisible(false);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(@NonNull MenuItem item) {
        switch (item.getItemId()){
            case R.id.menu_edit:
                username.setFocusable(true);
                password.setFocusable(true);
                nama.setFocusable(true);
                email.setFocusable(true);
                alamat.setFocusable(true);
                no_hp.setFocusable(true);

                InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
                imm.showSoftInput(username, InputMethodManager.SHOW_IMPLICIT);

                action.findItem(R.id.menu_edit).setVisible(false);
                action.findItem(R.id.menu_save).setVisible(true);

                return true;

            case R.id.menu_save:

                SaveEditDetail();
                action.findItem(R.id.menu_edit).setVisible(true);
                action.findItem(R.id.menu_save).setVisible(false);

                username.setFocusableInTouchMode(false);
                password.setFocusableInTouchMode(false);
                nama.setFocusableInTouchMode(false);
                email.setFocusableInTouchMode(false);
                alamat.setFocusableInTouchMode(false);
                no_hp.setFocusableInTouchMode(false);
                username.setFocusable(false);
                password.setFocusable(false);
                nama.setFocusable(false);
                email.setFocusable(false);
                alamat.setFocusable(false);
                no_hp.setFocusable(false);
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }

    }

    private void SaveEditDetail() {
        final String username = this.username.getText().toString().trim();
        final String password = this.password.getText().toString().trim();
        final String nama = this.nama.getText().toString().trim();
        final String email = this.email.getText().toString().trim();
        final String alamat = this.alamat.getText().toString().trim();
        final String no_hp = this.no_hp.getText().toString().trim();
        final String id = getId;

        final ProgressDialog progressDialog= new ProgressDialog(this);
        progressDialog.setMessage("Saving..");
        progressDialog.show();

//        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL)
    }

}
