import Header from '@/components/Header';
import Head from 'next/head';
import { useRouter } from "next/router";

export default function Page() {
  const router = useRouter()
  const { category, page } = router.query
  return (
    <>
      <Head>
        <title>Docudown</title>
      </Head>
      <div className="w-full h-full antialiased bg-white dark:bg-gray-700">
        <div className="flex flex-no-wrap">
          <Header />
          <div className="w-28 xl:w-56 flex flex-col justify-between text-gray-700 dark:text-white min-h-screen border-r bg-gray-100 border-gray-300 dark:bg-gray-800 dark:border-gray-700">
            {category} / {page}
          </div>
        </div>
      </div>
    </>
  );
}
