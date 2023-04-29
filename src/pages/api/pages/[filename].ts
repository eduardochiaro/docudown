import type { NextApiRequest, NextApiResponse } from 'next';
import prisma from '@/utils/prisma';
import { Page, Prisma } from '@prisma/client';

type Data = Page | null;

export default async function handler(req: NextApiRequest, res: NextApiResponse<Data>) {
  const { filename } = req.query;
  const page = await prisma.page.findFirst({
    where: {
      path: filename?.toString(),
    },
  });
  res.status(200).json(page);
}
