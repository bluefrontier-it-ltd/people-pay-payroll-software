import { Link, Head, router } from '@inertiajs/react';
import { useEffect, useState } from 'react';
import { Chart as ChartJS, ArcElement, Tooltip, Legend, CategoryScale, LinearScale, BarElement } from "chart.js";
import { Doughnut, Pie, Bar } from "react-chartjs-2";
//import Chart from 'chart.js/auto';

export default function Welcome({ auth, laravelVersion, phpVersion }) {

    //  useEffect(() => {
    //     ChartJS.register(ArcElement, Tooltip, Legend);
    //   }, []);
    ChartJS.register(ArcElement, Tooltip, Legend, CategoryScale, LinearScale, BarElement);

    const dataPie = {
        labels: [
          'Red',
          'Blue',
          'Yellow'
        ],
        datasets: [{
          label: 'My First Dataset',
          data: [300, 50, 100],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      };

      const dataPie2 = {
        labels: [
          'Red',
          'Blue',
          'Yellow'
        ],
        datasets: [{
          label: 'My First Dataset',
          data: [90, 78, 145],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      };

    const [activePieChart, setActivePieChart] = useState(dataPie);
    const switchToDataset1 = () => {

        // router.visit(
        //     route('movies.admin.index', { search: e.target.value }),
        //     { only: ['movies'], preserveState: true }
        //   );
        
        console.log('Switch to 1')
        setActivePieChart(dataPie);
      };
    
      const switchToDataset2 = () => {
        console.log('Switch to 2')
        setActivePieChart(dataPie2);
      };
    const labelBar = ['January', 'February', 'April', 'May', 'June', 'July']
    const dataBar = {
    labels: labelBar,
    datasets: [{
        label: 'My First Dataset',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
    };

    //   setActivePieChart(dataPie)

      const dataDoughnut = {
        labels: [
          'Red',
          'Blue',
          'Yellow'
        ],
        datasets: [{
          label: 'My First Dataset',
          data: [300, 50, 100],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      };
    return (
        <>
            <Head title="Welcome" />

            {auth.user ? (
                        <Link
                            href={route('dashboard')}
                            className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >
                            Dashboard
                        </Link>
                    ) : (
                        <>
                            <Link
                                href={route('login')}
                                className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                Log in
                            </Link>

                            <Link
                                href={route('register')}
                                className="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                Register
                            </Link>
                        </>
                    )}
            <div className='max-w-2xl flex flex-wrap flex-col'>
                <Doughnut data={dataDoughnut} />
                <Pie
                // options={...}
                data={activePieChart}
                // {...props}
                />
                <Bar data={dataBar}/>
            </div>

            <div>
                Pie
                <button
                    onClick={switchToDataset1}
                >
                    Dataset 1
                </button>
                <button
                     onClick={switchToDataset2}
                >
                    Dataset 2
                </button>
            </div>
        </>
    );
}
