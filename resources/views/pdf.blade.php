<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Computer and Notebook - Planned Preventive Maintenance</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 11px;

            }

            .container {
                padding: 10px;
            }

            .header-table {
                width: 100%;
            }

            .header-table td {
                vertical-align: top;
            }

            .logo {
                width: 100px;
                height: 100px;
            }

            .title h1 {
                font-size: 18px;
                font-weight: normal;
                margin: 0px;
                text-align: left;
                margin-left: 100px;
            }

            .title h2 {
                font-size: 16px;
                font-weight: normal;
                margin: 0;
                text-align: left;
                margin-left: 100px;
            }

            .title h3 {
                font-size: 14px;
                font-weight: normal;
                margin: 0;
                text-align: left;
                margin-left: 100px;
            }

            .network {
                text-align: left;
                margin-bottom: 10px;
                border-bottom: 1px solid #ccc;
                font-size: 12px;
            }

            .ppm {
                text-align: left;
                margin-bottom: 10px;
                color:gray;
                font-size: 11px;
            }

            .details {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .details p {
                margin: 2px 0; /* Adjust the margin values as needed */
            }

            .remarks {
                margin-top: 20px;
            }

            .checks-table {
                width: 100%;
                border-collapse: collapse;
            }

            .checks-table td {
                width: 50%; /* Ensures equal width for both columns */
                vertical-align: top; /* Aligns the content to the top of the cell */
                padding: 10px; /* Adds some padding for better readability */
            }

            .check-title {
                font-weight: bold;
                margin-bottom: 10px;
                background-color: #000;
                color: #fff;
                padding: 5px;
            }

            ul {
                list-style-type: none;
                padding-left: 2;
                padding-right: 2;
            }

            ul li {
                margin-bottom: 8px;
            }

            ul li span {
                float: right;
            }

            .signatures{
                display: block;
                margin-top: 10px;
                margin-bottom: 10px;
                background: black;
                color:white;
                justify-content: space-between;
                padding: 5px;
            }

            .signature-boxes {
                display: block;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .signature-box {
                width: 210px;
                height: 100px;
                border: 1px solid #000;
                display: inline-block;
                margin-left:10px;
                margin-top:20px;
            }

            .footer-note {
                text-align: center;
                margin-top: 50px; /* Adjust the space above the note */
                font-style: italic; /* Optional: Italicize the text */
                font-size: 14px; /* Adjust the font size as needed */
                color: #555; /* Optional: Use a lighter color for the text */
            }

        </style>
    </head>

    <body>
        <div class="container">
            <table class="header-table">
                <tr>
                    <td class="logo"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/prohawk.png'))) }}" style="width: 225px; height: 75;">
                        <td class="title">
                        <h1>PLANNED PREVENTIVE MAINTENANCE</h1>
                        <h2>HOSPITAL TUANKU AZIZAH</h2>
                        <br>
                      
                    </td>
                </tr>
            </table>

            <section class="network">
                <p>idk</p>
                <p>Update and verify inventory by checking and ticking boxes below</p>
            </section>

            <section class="details">
                <table width="100%" style="margin-bottom: 0px;">
                    <tr>
                        <td width="50%" style="vertical-align: top;">

                        </td>
                        <td width="50%" style="vertical-align: top;">

                        </td>
                        <td width="50%" style="vertical-align: top;">
                            <p><strong>Hostname: {{ $assetActivity->asset->hostname ?? 'N/A' }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%" style="vertical-align: top;">
                            <p>LOCATION</p>
                            <p>[/] Department : {{ $assetActivity->asset->department->name }}</p>
                            <p>[/] Room Name : {{ $assetActivity->asset->location->name }}</p>
                        </td>
                        <td width="50%" style="vertical-align: top;">
                            <p>CPU</p>
                            <p>[/] Brand : {{ $assetActivity->assetActivityComputerNotebookDetail->brand ?? 'N/A' }}</p>
                            <p>[/] Model : {{ $assetActivity->assetActivityComputerNotebookDetail->model ?? 'N/A' }}</p>
                            <p>[/] Serial Number : {{ $assetActivity->asset->serial_number ?? 'N/A' }}</p>
                            <p>[/] Processor Type : {{ $assetActivity->assetActivityComputerNotebookDetail->processor_type ?? 'N/A' }}</p>
                            <p>[/] RAM : {{ $assetActivity->assetActivityComputerNotebookDetail->ram ?? 'N/A' }}</p>
                        </td>
                        <td width="50%" style="vertical-align: top;">
                            <p>MONITOR (for computer only)</p>
                            <p>[/] Brand : {{ $assetActivity->assetActivityNetworkMonitor->brand ?? 'N/A' }}</p>
                            <p>[/] Model : {{ $assetActivity->assetActivityNetworkMonitor->model ?? 'N/A' }}</p>
                            <p>[/] Serial No : {{ $assetActivity->assetActivityNetworkMonitor->serial_no ?? 'N/A' }}</p>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td width="50%" style="vertical-align: top;">
                            <p>UPS (for computer only)</p>
                            <p>[/] Brand : {{ $assetActivity->assetActivityNetworkUps->brand ?? 'N/A' }}</p>
                            <p>[/] Model : {{ $assetActivity->assetActivityNetworkUps->model ?? 'N/A' }}</p>
                            <p>[/] Serial No : {{ $assetActivity->assetActivityNetworkUps->serial_number ?? 'N/A' }}</p>
                        </td>
                        <td width="50%" style="vertical-align: top;">
                            <p>NETWORK</p>
                            <p>[/] Network Port : {{ $assetActivity->assetActivityComputerNotebookDetail->network_port_remark ?? 'N/A' }}
                                <br>
                                Type Port : [{{ $assetActivity->assetActivityComputerNotebookDetail->dhcp ? '/' : ' ' }}]DHCP [{{ $assetActivity->assetActivityComputerNotebookDetail->static ? '/' : ' ' }}]Static
                            </p>
                        </td>
                        <td width="50%" style="vertical-align: top;">
                            <p>TAGGING</p>
                            <p>[{{ $assetActivity->assetActivityComputerNotebookDetail->device_in_tag == 1 ? '/' : ' ' }}] Device ID Tag:
                                <br>
                                Need Replacement : {{ $assetActivity->assetActivityComputerNotebookDetail->need_replacement == 1 ? 'Yes' : 'No' }}
                                <br>
                                Date Replaced : {{ $assetActivity->assetActivityComputerNotebookDetail->replaced_date ?? 'N/A' }}
                            </p>
                        </td>
                    </tr>
                </table>
            </section>

            <section class="checks">
                <div class="column">
                    <div class="check-title">CHECKLIST</div>
                    <ul>
                        <li>1. Empty recycle bin & delete *.tmp/*.dmp<span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->empty_recycle_bin == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li>2. Change local admin password<span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->change_local_password == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li>3. Check and Perform :</li>
                        <li style="margin-left: 1em;">a. Window updates - Latest version - ({{ $assetActivity->assetActivityComputerNotebookChecklist->window_update_remark ?? 'N/A' }})<span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->window_update == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">b. Microsoft Office 2016 - Make sure activated<span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->microsoft_office_active == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li>4. Antivirus SEP V14 : </li>
                        <li style="margin-left: 1em;">a. Check and review pattern. State last update  - ({{ $assetActivity->assetActivityComputerNotebookChecklist->review_pattern_date ?? 'N/A' }})<span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->review_pattern == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">b. Perform full scanning - ({{ $assetActivity->assetActivityComputerNotebookChecklist->full_scanning_date ?? 'N/A' }}) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->full_scanning == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li>5. Run GP update & reboot <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->gp_update_reboot == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li>6. Check UPS functionality (Switch off wall plug power) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->check_ups_function == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li>7. Antivirus SEP V14 : </li>
                        <li style="margin-left: 1em;">a. CPU and FAN (Vacuum and brush the CPU and check the CPU's cooling fan is working) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->vacuum_cpu_fan == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">b. RAM (Take out, brush and plug in)  <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->check_ram == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">c. Mouse and keyboard (Make sure is free of dust and grime. Test the functionality) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->clean_mouse_keyboard == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">d. Monitor / Screen (Clean the monitor / screen by using spray cleaner and cloths) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->clean_monitor_screen == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">e. CD-ROM/DVD Drive(Clean the laser and tray by using CD cleaner disk) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->clean_cd_rom_drive == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">f. Check Cable Tidiness (Make sure the tidiness of cable)   <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->cable_tidiness == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">g. Check connection (Make sure all data cables and power cables are sug in the their connection) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->check_connection == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li style="margin-left: 1em;">h. Check Signal (Check LED signal of hard-disk, CPU and monitor) <span>{{ $assetActivity->assetActivityComputerNotebookChecklist ? ($assetActivity->assetActivityComputerNotebookChecklist->check_signal == 1 ? 'Yes' : 'No') : 'N/A' }}</span></li>
                        <li>8. Check Harddisk Storage : </li>
                        <li style="margin-left: 1em;">Drive : {{ $assetActivity->assetActivityComputerNotebookChecklist->drive ?? 'N/A' }} <span>Used Space : {{ $assetActivity->assetActivityComputerNotebookChecklist->used_space ?? 'N/A' }} GB , Free Space : {{ $assetActivity->assetActivityComputerNotebookChecklist->free_space ?? 'N/A' }} GB</span></li>
                        <li>9. Defragmentation ( Analysis Result (%) : {{ $assetActivity->assetActivityComputerNotebookChecklist->analysis_result ?? 'N/A' }} )<span>Type : [{{ $assetActivity->assetActivityComputerNotebookChecklist->defragment ? '/' : ' ' }}] Defrag  [{{ $assetActivity->assetActivityComputerNotebookChecklist->dont_need_to_defrag ? '/' : ' ' }}] Do Not Defrag</span></li>

                    </ul>
                </div>
            </section>

            <br>

                <div class="check-title">E. REMARK</div>
                <ul>
                    <li> {{ $performed_by ? $performed_by->name : 'N/A' }} - {{ $performed_remark}}</li>
                </ul>
            <br>
                <section class="signatures text-center">
                    <span style="width: 14%; display: inline-block;">Buyer Name </span>
                    <span style="color: yellow; width: 18%; display: inline-block;;"></span>
                    <span style="width: 13%; display: inline-block;">Product Name </span>
                    <span style="color: yellow; width: 19%; display: inline-block;;"></span>
                    <span style="width: 16%; display: inline-block;">Payment Status </span>
                    <span style="color: yellow; width: 15%; display: inline-block;;"></span>
                </section>

                <section class="signature-boxes text-center">
                    <div class="signature-box">
                        <span style="font-size: 12px;">
                            {{ $performed_by ? $performed_by->name : 'N/A' }}
                        </span>
                        <span style="font-size: 12px;">
                            {{ $performed_date ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="signature-box">
                        <span style="font-size: 12px;">
                            {{ $acknowledged_by ? $acknowledged_by->name : 'N/A' }}
                        </span>
                        <span style="font-size: 12px;">
                            {{ $acknowledged_date ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="signature-box">
                        <span style="font-size: 12px;">
                            {{ $verified_by ? $verified_by->name : 'N/A' }}
                        </span>
                    </div>
                </section>

                <section class="footer-note">
                    <p>NOTE: This PPM Form is computer generated and no signature is required.</p>
                </section>
        </div>
    </body>
</html>
