package com.bpbd.www.bpbdjember.helper;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import com.bpbd.www.bpbdjember.LoginActivity;
//import com.bpbd.www.bpbdjember.ProfilActivity;

import java.util.HashMap;

public class SessionManager {
    public static final String PREF_NAME = "LOGIN" ;
    public static final String LOGIN = "US_LOGIN";
    public static final String ID = "ID";
    public static final String BASE_URL = "http://192.168.1.2/Kel2_TIF-D/BPBD_JEMBER_WEB/";

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor editor;
    public Context context;

    @SuppressLint("CommitPrefEdits")
    public SessionManager(Context context){
        this.context = context;
        int PRIVATE_MODE = 0;
        sharedPreferences = context.getSharedPreferences(PREF_NAME, PRIVATE_MODE);
        editor = sharedPreferences.edit();
    }

    public void createSession(String id){
        editor.putBoolean(LOGIN, true);
        editor.putString(ID, id);
        editor.apply();
    }

    private boolean isLogin() { return  sharedPreferences.getBoolean(LOGIN, false); }

//    public void checkLogin(){
//        if (!this.isLogin()){
//            Intent intent = new Intent(context, Login.class);
//            context.startActivity(intent);
//            ((BerandaOrenz) context).finish();
//        }
//    }

// public void checkLogin(){
//        if (!this.isLogin()){
//            Intent i = new Intent(context, LoginActivity.class);
//            context.startActivity(i);
//            ((ProfilActivity) context).finish();
//        }
//    }

    public HashMap<String, String> getUserDetail(){
        HashMap<String, String> user = new HashMap<>();
        user.put(ID, sharedPreferences.getString(ID, null));
        return user;
    }

    public HashMap<String, String> getBaseUrl(){
        HashMap<String, String> url = new HashMap<>();
        url.put(BASE_URL, sharedPreferences.getString(BASE_URL, null));
        return url;
    }

//    public void logout(){
//        editor.clear();
//        editor.commit();
//        Intent intent = new Intent(context, Login.class);
//        context.startActivity(intent);
//        ((BerandaOrenz) context).finish();
//    }
}
