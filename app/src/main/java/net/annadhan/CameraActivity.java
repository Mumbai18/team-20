package net.annadhan;

import android.content.Intent;
import android.graphics.Bitmap;
import android.location.Location;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.LocationServices;


public class CameraActivity extends AppCompatActivity implements GoogleApiClient.ConnectionCallbacks, GoogleApiClient.OnConnectionFailedListener {

    //Declare inside class
    Button btnCamera;
    ImageView ivCamera;
    Bitmap bm;
    GoogleApiClient gac;
    Location loc;
    double lat, lon;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_camera);

        //Bind inside onCreate()
        btnCamera = (Button) findViewById(R.id.btnCamera);
        ivCamera = (ImageView) findViewById(R.id.ivCamera);

        GoogleApiClient.Builder builder = new GoogleApiClient.Builder(this);
        builder.addApi(LocationServices.API);
        builder.addConnectionCallbacks(this);
        builder.addOnConnectionFailedListener(this);
        gac = builder.build();

        btnCamera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Opens camera
                Intent i = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(i, 100);
            }
        });
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        bm = (Bitmap) data.getExtras().get("data");
        ivCamera.setVisibility(View.VISIBLE);
        ivCamera.setImageBitmap(bm);
    }

    @Override
    public void onConnected(Bundle bundle) {

        loc = LocationServices.FusedLocationApi.getLastLocation(gac);
        if (loc != null) {
            lat = loc.getLatitude();
            lon = loc.getLongitude();
            Toast.makeText(this, "Latitude: " + lat + " Longitude: " + lon, Toast.LENGTH_SHORT).show();
        } else {
            Toast.makeText(this, "Please enable GPS", Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    public void onConnectionSuspended(int i) {
        Toast.makeText(this, "Connection suspended", Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onConnectionFailed(ConnectionResult connectionResult) {
        Toast.makeText(this, "Connection failed", Toast.LENGTH_SHORT).show();
    }

    @Override
    protected void onStart() {
        super.onStart();
        if (gac != null) gac.connect();
    }

    @Override
    protected void onStop() {
        super.onStop();
        if (gac != null) gac.disconnect();
    }
}
