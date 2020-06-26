@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>Inspection Form</title>
    @endsection
    @section('content')

    <section class="content">
<div class="container">
  <form>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block label-control">Name of  Family</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Tenant ID Number</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Date of Request (mm/dd/yyyy)</label>
        <input class="form-control" type="text" name="">
      </div>
    </div>

    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Inspector</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Nelghborhood/Census Tract</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Date of Inspection (mm/dd/yyyy)</label>
        <input class="form-control" type="text" name="">
      </div>
    </div>


    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Type of Inspection</label>
        <div class="row">
          <div class="col-sm-4 border-none mt"><input type="checkbox"> Initial</div>
          <div class="col-sm-4 border-none pad4 mt"><input type="checkbox"> Special</div>
          <div class="col-sm-4 border-none pad0 mt"><input type="checkbox"> Reinspection</div>
        </div>
      </div>
      <div class="col-sm-4">
        <label class="block">Date of Inspection (mm/dd/yyyy)</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">PHA</label>
        <input class="form-control" type="text" name="">
      </div>
    </div>


    <!-- TWO COLUM -->
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-info cslabel">A. General Information</label>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <label class="block">Inspected Unit</label>
        <p class="padL15">Full Address (Including Street, City, Country, State, Zip)</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
      <div class="col-sm-3 ml border-none pad0">
        <label class="block border-b padL15">Year of Constructed (yyyy)</label>
        <p class="padL15">&nbsp;</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
      <div class="col-sm-3 ml border-none pad0">
        <label class="block border-b padL15">Number of Children in Family Under 6</label>
        <p class="padL15">&nbsp;</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
    </div>

    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-default cslabel">Owner</label>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <label class="block">Inspected Unit</label>
        <p class="padL15">Full Address (Including Street, City, Country, State, Zip)</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
      <div class="col-sm-3 ml border-none pad0">
        <label class="block border-b padL15">Year of Constructed (yyyy)</label>
        <p class="padL15">&nbsp;</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>

      <div class="col-sm-3">
        <label class="block">Number of Children in Family Under 6</label>
        <p class="padL15">&nbsp;</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>

      <div class="col-sm-8">
        <label class="block mar15">Name of Owner or Agent Authourized to Lease Unit Inspected</label>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>

      <div class="col-sm-4">
        <label class="block mar15">Phone Number</label>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>

      <div class="col-sm-12 mar15">
        <label class="block">Address of Owner or Agent</label>
        <p class="padL15">Full Address (Including Street, City, Country, State, Zip)</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <label class="block">Housing Type ( check as appropriate )</label>
        <div class="row">
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Single Family Detached</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Duplex or Two Family</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Row House or Town House</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Low Rise: 3, 4 Stories Including Garden Apartment</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> High Rise: 5 or More Stories</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Manufactured Home</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Congregate</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Cooperrative</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Independent Group Residence</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Signgle Room Occupancy</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Shared Housing</div>
          <div class="col-sm-3 border-none marb15"><input type="checkbox"> Other</div>
        </div>
      </div>
    </div>


    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-info cslabel">B. Summary Decision On Unit (To be completed after form has been filled out)</label>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-3">
        <div class="row">
          <div class="col-sm-12">
            <label class="block">Housing Type ( check as appropriate )</label>
            <div class="row">
              <div class="col-sm-12 border-none"><input type="checkbox"> Pass</div>
              <div class="col-sm-12 border-none"><input type="checkbox"> Fail</div>
              <div class="col-sm-12 border-none"><input type="checkbox"> Inconclusive</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 ml border-none pad0">
        <label class="block border-b padL15">Number of  Bedrooms for Purposes Of the FMR or Payment Standard</label>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>

      <div class="col-sm-3">
        <label class="block">Number of Sleeping Rooms</label>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
    </div>

    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-default cslabel">Inspection Checklist</label>
      </div>
    </div>





    <!-- Accordion -->

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1. Living Room</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse1" class="panel-collapse collapse">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.1 Living Room Present</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">1.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>
            </div>
        </div>

        <!-- FORM-2  -->
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2. Kitchen</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse2" class="panel-collapse collapse">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.1 Kitchen Present</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">2.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.10 Stove of Range with Oven</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.11 Refrigerator</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.12 Sink</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.13 Space for Storage, Preparation, and Serving of Food</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>
            </div>
        </div>

        <!-- FORM-3  -->
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3. Bathroom</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse3" class="panel-collapse collapse">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.1 Bathroom Present</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">3.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.10 Flush Toilet in Enclosed Room in Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.11 Fixed Wash Basin or Lavatory in Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.12 Tub or Shower in Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.13 Ventilation</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>
            </div>
        </div>

        <!-- FORM-4  -->
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4. Other Rooms Used For Living and Halls</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse4" class="panel-collapse collapse">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Floor Level</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>


          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Floor Level</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Floor Level</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Floor Level</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="optradio"> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Floor Level</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Celling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>
            </div>
        </div>

        <!-- FORM-5  -->
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5. All Secondary Rooms (Rooms not used foe living)</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse5" class="panel-collapse collapse">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.1 None Go to Part 6</label>
            </div>

            <!-- <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div> -->
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.2 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <!-- <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div> -->

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.4 Other Potentially Hazardous Features in these Rooms</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>
            </div>
        </div>

         <!-- FORM-6  -->
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6. Building Exterior</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse6" class="panel-collapse collapse">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.1 Condition of Foundation</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.2 Condition of Stairs, rails, and Porches</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.3 Condition of Roof / Gutters</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.4 Condition of Exterior Surfaces</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.5 Condition of Chimney</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">6.6 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name="" placeholder="Not Applicable"></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                        <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <textarea class="form-control" type="text" name=""></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.7 Manufactured Home: Tie Downs</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>
            </div>
        </div>

         <!-- FORM-7  -->
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7. Heating and Plumbing</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse7" class="panel-collapse collapse">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.1 Adquacy of Heating Equipment</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.2 Safety of Heating Equipment</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.3 Ventilation/Cooling</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.4 Water Heater</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.5 Approvable Water Supply</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.6 Plumbing</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">7.7 Sewer Connection</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

            </div>
        </div>

        <!-- FORM-8  -->
        <div class="panel panel-default">
          <div class="alert alert-info panel-heading">
              <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
            <i class="more-less glyphicon glyphicon-minus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8. General Health and Safety</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
          </div>
            <div id="collapse8" class="panel-collapse collapse in">
              <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.1 Access to Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.2 Fire Exits</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.3 Evidence of Infestation</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.4 Garbage and Debris</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.5 Refuse Disposal</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.6 Interior Stairs and Common Halls</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.7 Other Interior Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.8 Elevators</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.9 Interior Air Quality</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.10 Site and Neighborhood Conditions</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.11 Lead-Based Paint: Owner’s Certification</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Fail</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea class="form-control" type="text" name=""></textarea>
            </div>
          </div>

            </div>
        </div>
      </div>


      <!-- TWO COLUM -->
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-info cslabel"> Inspection Rent Reasonableness Form</label>
      </div>

    </div>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block label-control">Name of  Family</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Tenant ID Number</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Date of Request (mm/dd/yyyy)</label>
        <input class="form-control" type="text" name="">
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Inspector</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">In Place? Yes/No</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Date of Inspection (mm/dd/yyyy)</label>
        <input class="form-control" type="text" name="">
      </div>
    </div>


    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Type of Inspection</label>
        <div class="row">
          <div class="col-sm-6 border-none mt"><input type="checkbox"> Initial</div>
          <div class="col-sm-6 border-none pad4 mt"><input type="checkbox"> Change of Unit</div>
          <div class="col-sm-6 border-none pad0 mt"><input type="checkbox"> Complaint</div>
          <div class="col-sm-6 border-none pad0 mt"><input type="checkbox"> Annual</div>
          <div class="col-sm-6 border-none pad0 mt"><input type="checkbox"> Move-out</div>
        </div>
      </div>
      <div class="col-sm-4">
        <label class="block">Date of Inspection (mm/dd/yyyy)</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">HA</label>
        <input class="form-control" type="text" name="">
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-default cslabel">Contact Person(s)</label>
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-6">
        <label class="block">Inspected Unit</label>
        <p class="padL15">Street Address (Including City, Country, State, Zip)</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
      <div class="col-sm-6 ml border-none pad0">
        <label class="block border-b padL15">LL Ph#</label>
        <p class="padL15">&nbsp;Number of Bedrooms</p>
        <textarea class="form-control" type="text" name="" class="padL15"></textarea>
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-6 pull-right text-right" >
        <b>Children Under 6?</b> <input type="checkbox">
      </div>
    </div>
    <div class="row mar0 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Unit Condition</label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-4 border-none"><input type="checkbox"> Good</div>
              <div class="col-xs-4 border-none"><input type="checkbox"> Average</div>
              <div class="col-xs-4 border-none"><input type="checkbox"> Minimal HQS</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mar0 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Unit Condition</label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-4 border-none"><input type="checkbox"> Good</div>
              <div class="col-xs-4 border-none"><input type="checkbox"> Average</div>
              <div class="col-xs-4 border-none"><input type="checkbox"> Minimal HQS</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mar0 padtb15 bg1">
      <div class="col-sm-4">
        <label class="block label-control">Unit Size:</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Bathroom</label>
        <input class="form-control" type="text" name="">
      </div>
      <div class="col-sm-4">
        <label class="block">Housing Type</label>
        <input class="form-control" type="text" name="">
      </div>
    </div>

    <div class="row mar0 mar15 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Features: </label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Air Cond.</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Intercom Access</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>W/D Hook-up</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Microwave</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Recently Renovated</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Extra Room</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Dishwasher</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Private Dessk/Patio</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Stove</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Refrigerator</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Garbage Disposal</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Washer</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Dryer</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Walk-in Closet</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>New Appliances</b> </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mar0 mar15 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Amenities: </label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Laundry Facility</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Exercise Facility</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Recreational Facility</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Garage</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Handicap Access</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Off-Street</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Locked Storage</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>On-SIte Mgmt</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Security Syatem</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Elevator</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Heat Included</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Hot Water Included</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Dryer</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>Walk-in Closet</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input type="checkbox"> <b>New Appliances</b> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mar0 padtb15">
      <div class="col-sm-4 ml border-none pad0">
           <label class="block border-b padL15">Status:</label><br>
<label id="status-error" class="text-danger" for="status" ></label>


      </div>

      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-6 border-none"><input type="checkbox"> <b>Passed</b></div>
              <div class="col-xs-6 border-none"><input type="checkbox"> <b>Failed</b></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mar0 entry-date-wrapper">
        <label class="block">No entry date(s)</label>
        <input class="form-control date" type="text" name=""></input>
      </div>
    </div>
    <div class="row mar0 padtb15">
      <div class="col-sm-12 col-xs-12 col-md-12 mar0">
        <label class="block">Comment:</label>
        <textarea class="form-control" type="text" name=""></textarea>
      </div>
    </div>

    <!-- Form END -->
  </form>
</div>


    </section>
@endsection

@section('js')
    @parent

       <script type="text/javascript">
    $(document).ready(function() {
        // alert("Settings page was loaded");
        $('#checkbox1').change(function() {
        if(this.checked) {
            var returnVal = confirm("Are you sure?");
            $(this).prop("checked", returnVal);
        }
        alert('changes');
    });
    });

       function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);


        </script>
    @endif
@endsection