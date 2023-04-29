import React, { ReactNode, useEffect, useState } from 'react';
import Markdoc from '@markdoc/markdoc';
import Head from 'next/head';
import useStaleSWR from '../utils/staleSWR';
import styles from '../styles/Page.module.scss';

const ShowContent = ({ content }: { content: ReactNode | null }) => {
  if (!content) {
    return <p>Loading...</p>;
  }
  return <>{content}</>;
};

const Page = ({ category, page }: { category: string | string[] | undefined; page: string | string[] | undefined }) => {
  const [htmlContent, setHtmlContent] = useState<ReactNode | null>(null);
  const { data } = useStaleSWR(`/api/pages/${page}`);

  useEffect(() => {
    if (data && data.content) {
      const est = Markdoc.parse(data?.content);
      const content = Markdoc.transform(est);
      const html = Markdoc.renderers.react(content, React);
      setHtmlContent(html);
    }
  }, [data]);

  return (
    <>
      <Head>
        <title>{data?.title} / Docudown</title>
      </Head>
      <div className="grow max-w-xl mx-auto">
        {data && (
          <div className={`${styles['page']}`}>
            <ShowContent content={htmlContent} />
          </div>
        )}
      </div>
    </>
  );
};

export default Page;
