<?php

namespace station\Http\Controllers;
use App\layouts;
use station\Station;
use station\problemConfigurations;
use Illuminate\Http\Request;

class ProblemConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $stations = Station::where('StationCategory', 'aws')->get();
        return view('layouts.configureProblems', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editForm()
    {
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $station = Station::where('StationName', $request->get('station_selected'))->first();
        
        $stationOffconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'max_track_counter'=>1,
            'problem_id'=>1,
            'report_method'=>$request->get('sorptmethod'),
            'criticality'=>$request->get('socriticallity'),
            'reporting_time_interval'=>$request->get('soprobRptTime'),
        
        ]);
        $stationOffconfiguration->save();
        $NodeOffconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>2,
            'max_track_counter'=>$request->get('nooccurencesConsider'),
            'report_method'=>$request->get('norptmethod'),
            'criticality'=>$request->get('nocriticallity'),
            'reporting_time_interval'=>$request->get('noprobRptTime'),
        
        ]);
        $NodeOffconfiguration->save();
        $sensorOffconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>3,
            'max_track_counter'=>$request->get('ssoccurencesConsider'),
            'report_method'=>$request->get('ssorptmethod'),
            'criticality'=>$request->get('ssocriticallity'),
            'reporting_time_interval'=>$request->get('ssoprobRptTime'),
        
        ]);
        $sensorOffconfiguration->save();
        $lownodeValuesconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>4,
            'max_track_counter'=>$request->get('lpoccurencesConsider'),
            'report_method'=>$request->get('lprptmethod'),
            'criticality'=>$request->get('lpcriticallity'),
            'reporting_time_interval'=>$request->get('lpprobRptTime'),
        
        ]);
        $lownodeValuesconfiguration->save();

        $missingSensorValuesconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>5,
            'max_track_counter'=>$request->get('msoccurencesConsider'),
            'report_method'=>$request->get('msrptmethod'),
            'criticality'=>$request->get('mscriticallity'),
            'reporting_time_interval'=>$request->get('msprobRptTime'),
        ]);
        $missingSensorValuesconfiguration->save();
        $missingnodeValuesconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>6,
            'max_track_counter'=>$request->get('nmoccurencesConsider'),
            'report_method'=>$request->get('nmrptmethod'),
            'criticality'=>$request->get('nmcriticallity'),
            'reporting_time_interval'=>$request->get('nmprobRptTime'),
        ]);
        $missingnodeValuesconfiguration->save();
        $incorrectDateValuesconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>7,
            'max_track_counter'=>$request->get('idoccurencesConsider'),
            'report_method'=>$request->get('idrptmethod'),
            'criticality'=>$request->get('idcriticallity'),
            'reporting_time_interval'=>$request->get('idprobRptTime'),
        
        ]);
        $incorrectDateValuesconfiguration->save();

        $incorrectSensorValuesconfiguration = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>8,
            'max_track_counter'=>$request->get('isoccurencesConsider'),
            'report_method'=>$request->get('isrptmethod'),
            'criticality'=>$request->get('iscriticallity'),
            'reporting_time_interval'=>$request->get('isprobRptTime'),
        
        ]);
        $incorrectSensorValuesconfiguration->save();

        $packetDroppingProblems = new problemConfigurations([
            'station_id'=> $station['station_id'],
            'problem_id'=>9,
            'max_track_counter'=>$request->get('pdoccurencesConsider'),
            'report_method'=>$request->get('pdrptmethod'),
            'criticality'=>$request->get('pdcriticallity'),
            'reporting_time_interval'=>$request->get('pdprobRptTime'),
        
        ]);
        $packetDroppingProblems->save();

        return redirect('/configureproblem');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
